@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Crear producto
  </div>
  <div class="card-body">
    <form method="POST" action="{{route("admin.product.create")}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="" type="text" class="form-control">
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
              <input name="price" value="" type="number" class="form-control">
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
        <textarea class="form-control" name="description" rows="3"></textarea>
				@error("description")
					<p style="color:red">{{ $message }}</p>
				@enderror
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Mantenimiento de productos
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
				@foreach ($viewData["products"] as $product)
					<tr>
						<td>{{ $product->getId() }}</td>
						<td>{{ $product->getName() }}</td>
						<td><a href="{{route("admin.product.edit",$product->getId())}}">Editar</a></td>
						<td><a href="{{route('admin.product.delete',$product->getId())}}">Eliminar</a></td>
					</tr>
				@endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
