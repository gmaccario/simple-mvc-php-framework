<?php 
namespace App\Models;

class Product
{
	protected $id;
	protected $title;
	protected $description;
	protected $price;
	protected $sku;
	protected $image;
	
    // GET METHODS
	public function getId()
	{
		return $this->id;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function getSku()
	{
		return $this->sku;
	}
	
	public function getImage()
	{
		return $this->image;
	}
	
    // SET METHODS
    public function setTitle(string $title)
	{
		$this->title = $title;
	}
	
	public function setDescription(string $description)
	{
		$this->description = $description;
	}
	
	public function setPrice(string $price)
	{
		$this->price = $price;
	}
	
	public function setSku(string $sku)
	{
		$this->sku = $sku;
	}
	
	public function setImage(string $image)
	{
		$this->image = $image;
	}

    // CRUD OPERATIONS
	public function create(array $data)
	{
		
	}
	
	public function read(int $id)
	{
		$this->title = 'My first Product';
		$this->description = 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ';
		$this->price = 2.56;
		$this->sku = 'MVC-SP-PHP-01';
		$this->image = 'https://via.placeholder.com/150';

		return $this;
	}
	
	public function update(int $id, array $data)
	{
		
	}
	
	public function delete(int $id)
	{
		
	}
}