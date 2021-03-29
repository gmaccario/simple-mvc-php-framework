<?php 

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    // Show the product attributes based on the id.
	public function showAction(int $id)
	{
        $product = new Product();
        $product->read($id);

        require_once APP_ROOT . '/views/product.php';
	}
}