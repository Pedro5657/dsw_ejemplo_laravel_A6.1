<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
		protected $fillable = ["name", "price", "description", "image"];

		public function getId(): int
		{
			return $this->id;
		}

		public function getName(): string
		{
			return $this->name;
		}
		
		public function getPrice(): int
		{
			return $this->price;
		}

		public function getDescription(): string
		{
			return $this->description;
		}

		public function getImage(): string
		{
			return $this->image;
		}
		
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
