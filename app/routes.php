<?php 

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\NoConfigurationException;

$context = new RequestContext();

// Routing can match routes with incoming requests
$matcher = new UrlMatcher($routes, $context);
try {
    $matcher = $matcher->match($_SERVER['REQUEST_URI']);

    array_walk($matcher, function(&$param)
    {
        if(is_numeric($param)) 
        {
            $param = (int) $param;
        }
    });

    // https://github.com/gmaccario/simple-mvc-php-framework/issues/2
    // Issue #2: Fix Non-static method ... should not be called statically
    $className = '\\App\\Controllers\\' . $matcher['controller'];
    $classInstance = new $className();

    call_user_func_array(array($classInstance, $matcher['method']), array_slice($matcher, 2, -1));
} catch (MethodNotAllowedException $e) {
    echo 'Route method is not allowed.';
} catch (ResourceNotFoundException $e) {
    echo 'Route does not exists.';
} catch (NoConfigurationException $e) {
    echo 'Configuration does not exists.';
}
