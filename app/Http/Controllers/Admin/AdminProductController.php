<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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

		public function create(ProductRequest $request) 
		{
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

		public function edit(int $id)
		{
			return view("admin.product.edit")->with("product",Product::find($id));
		}
		public function update(int $id, ProductRequest $request)
		{
			$updatedProduct = Product::find($id);
			$updatedProduct->update([
				"name" => $request->input("name"),
				"price" => $request->input("price"),
				"description" => $request->input("description")
			]);
			if ($request->file("image") != null){
				$imageName = $request->file("image")->hashName();
				Storage::disk("public")->put($imageName,file_get_contents($request->file("image")->getRealPath()));
				if ($updatedProduct->getImage() != "default-product-image.png"){
					Storage::disk("public")->delete($updatedProduct->getImage());
				}
				$updatedProduct->update(["image" => $imageName]);
			}
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