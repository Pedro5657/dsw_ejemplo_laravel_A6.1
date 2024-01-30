<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

		public function create(Request $request) 
		{
			$request->validate([
				"name" => "required|max:255",
				"price" => "required|numeric|gt:0",
				"description" => "required",
			]);
			$product = new Product();
			$product->setName($request->input("name"));
			$product->setPrice($request->input("price"));
			$product->setDescription($request->input("description"));
			$product->setImage("image.jpg");
			$product->save();
			return redirect()->route("admin.product.index")->with("success","Product created successfully");
		}
}