<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
				"image" => "image"
			]);
			$product = new Product();
			$product->setName($request->input("name"));
			$product->setPrice($request->input("price"));
			$product->setDescription($request->input("description"));
			if ($request->file("image") != null){
				$imageName = $request->file("image")->hashName();
				Storage::disk("public")->put($imageName,file_get_contents($request->file("image")->getRealPath()));
			} else
					$imageName = "default-product-image.png";
			$product->setImage($imageName);
			$product->save();
			//Generar un nombre hash para la imagen es más seguro que utilizar su nombre original.
			return redirect()->route("admin.product.index");
		}

		public function delete(int $id)
		{
			return view("admin.product.delete")->with("product",Product::find($id));
		}

		public function destroy(int $id)
		{
			Product::destroy($id);
			return redirect()->route("admin.product.index");
		}
}