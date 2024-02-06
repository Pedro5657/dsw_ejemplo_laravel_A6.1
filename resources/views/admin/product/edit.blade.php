@extends('layouts.admin')
@section('title','Edición de producto')
@section('content')
<h1>Edición de {{$product->getName()}}</h1>
<form method="POST" action="{{route("admin.product.update",$product->getId())}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row">
		<div class="col">
			<div class="mb-3 row">
				<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
				<div class="col-lg-10 col-md-6 col-sm-12">
					<input name="name" value="{{$product->getName()}}" type="text" class="form-control">
					@error("name")
					<p style="color:red">{{ $message }}</p>
					@enderror
				</div>
			</div>
		</div>
		<div class="col">
			<div class="mb-3 row">
				<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
				<div class="col-lg-10 col-md-6 col-sm-12">
					<input name="price" value="{{$product->getPrice()}}" type="number" class="form-control">
					@error("price")
					<p style="color:red">{{ $message }}</p>
					@enderror
				</div>
			</div>
		</div>
	</div>
	<div class="mb-3">
		<label class="form-label">Imagen:</label>
		<input name="image" type="file" class="form-control">
		@error("image")
		<p style="color:red">{{ $message }}</p>
		@enderror
	</div>
	<div class="mb-3">
		<label class="form-label">Descripción</label>
		<textarea class="form-control" name="description" rows="3">{{$product->getDescription()}}</textarea>
		@error("description")
		<p style="color:red">{{ $message }}</p>
		@enderror
	</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection