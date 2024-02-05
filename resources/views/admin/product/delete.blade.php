@extends('layouts.admin')
@section('title','Product deletion')
@section('content')
<img src="{{asset("storage/".$product->getImage())}}" alt="{{$product->getName()}}">
<p>{{$product->getName()}}</p>
<form method="POST" action="{{route("admin.product.destroy",$product->getId())}}">
	@csrf
	@method('DELETE')
	<label for="deletion">¿Seguro que quieres eliminar el producto?</label>
	<input type="submit" id="deletion" value="Eliminar">
</form>
@endsection