<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private array $products = [
				0 => [
					"name" => "TV",
					"description" => "Best TV",
					"image" => "game.png",
					"price" =>"$1500"
					],
				1 => [
					"name" => "iPhone",
					"description" => "Best iPhone",
					"image" => "safe.png",
					"price" =>"$700"
					],
				2 => [
					"name" =>  "Chromecast",
					"description" => "Best Chromecast",
					"image" => "submarine.png",
					"price" =>"$5"
					],
				3 => [
					"name" =>  "Glasses",
					"description" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde ipsum impedit sed iusto ratione ab totam autem nesciunt. Rem magni nulla, aut delectus nemo enim excepturi quae voluptatum inventore corrupti commodi fuga harum optio nostrum, deserunt officia a similique. Explicabo velit cupiditate optio, eveniet quasi provident. Dicta, officiis perspiciatis atque similique expedita quidem cupiditate quod reprehenderit, tenetur suscipit eligendi quia.",
					"image" => "game.png",
					"price" => "$100000"
					]
			];

		public function index()
		{
			return view("product.index")->with("products",$this->products);
		}

		public function show($id)
		{
			return view("product.show")->with("product",$this->products[$id]);
		}
}