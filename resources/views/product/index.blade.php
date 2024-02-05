@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
	Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati dolorem repellendus nam veritatis aliquid, molestiae in temporibus eos error voluptatum id totam nulla perferendis minus quas eum voluptatibus aperiam deleniti ab voluptas, ex labore, tempora aspernatur eaque! Rem, iure, adipisci delectus eius ducimus harum quos voluptate asperiores placeat, beatae omnis? Iusto cumque delectus odio cupiditate sapiente, velit dolor tempora expedita.
  @foreach ($viewData["products"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/storage/'.$product["image"]) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product["id"]]) }}"
          class="btn bg-primary text-white">{{ $product["name"] }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
