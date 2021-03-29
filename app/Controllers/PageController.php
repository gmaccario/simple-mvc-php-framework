<?php 

namespace App\Controllers;

use App\Models\Product;

class PageController
{
    // Homepage action
	public function indexAction()
	{
        require_once APP_ROOT . '/views/home.php';
	}
}