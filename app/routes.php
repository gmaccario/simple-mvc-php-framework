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

    call_user_func_array(array('\\App\\Controllers\\' . $matcher['controller'], $matcher['method']), array_slice($matcher, 2, -1));
} catch (MethodNotAllowedException $e) {
    echo 'Route method is not allowed.';
} catch (ResourceNotFoundException $e) {
    echo 'Route does not exists.';
} catch (NoConfigurationException $e) {
    echo 'Configuration does not exists.';
}
