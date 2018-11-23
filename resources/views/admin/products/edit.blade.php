@extends('layouts.app')

@section('title','Bienvenido a su Tienda Virtual Online')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
      <div class="container">
        
      </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      	<h2 class="title text-center" >Editar Producto</h2>

      	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

      <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">	
      	{{ csrf_field() }}

      	<div class="row">
	      	<div class="col-sm-6">
				<div class="form-group label-floating"> 
					<label class="control-label">Nombre</label>
					<input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group label-floating">
					<label class="control-label">Precio</label>
					<input type="number" class="form-control" step="0.01" name="price" value="{{ old('price',$product->price) }}">
				</div>
			</div>


		</div>

		
		<div class="form-group label-floating">
			<label class="control-label">Descripción corta</label>
			<input type="text" class="form-control" name="description" value="{{ old('description',$product->description) }}">
		</div>
		

		
		<div class="form-group label-floating">
			<label class="control-label">Descripción completa</label>
			<textarea class="form-control" name="long_description" rows="5" >{{ old('long_description', $product->long_description) }}</textarea>
		</div>
		

		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>

		




      	
      </form>
      
    </div>
  </div>
</div>
    

@endsection
