<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
		
		public function setName(string $name)
		{
			$this->name = $name;
		}
		
		public function setPrice(int $price)
		{
			$this->price = $price;
		}
		
		public function setDescription(string $description)
		{
			$this->description = $description;
		}

		public function setImage(string $route)
		{
			$this->image = $route;
		}
}
