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

      	<h2 class="title text-center">Registrar Nuevo Producto</h2>

      	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

      	<form method="post" action="{{ url('/admin/products/') }}">	
      		{{ csrf_field() }}

      		<div class="row">
	      		<div class="col-sm-6">
					<div class="form-group label-floating"> 
						<label class="control-label">Nombre</label>
						<input type="text" class="form-control" name="name" value="{{ old('name') }}">
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group label-floating">
						<label class="control-label">Precio</label>
						<input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}">
					</div>
				</div>


			</div>

			
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group label-floating">
						<label class="control-label">Descripción corta</label>
						<input type="text" class="form-control" name="description" value="{{ old('description') }}">
					</div>
				</div>

				
				<div class="col-sm-6">
					<div class="form-group label-floating">
						<label class="control-label">Categoría del Producto</label>
						<select class="form-control" name="category_id">
							<option value="0" >General</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>

							@endforeach
						</select>
					</div>
				</div>


			</div>
			

			
			<div class="form-group label-floating">
				<label class="control-label">Descripción completa</label>
				<textarea class="form-control" name="long_description" rows="5">{{ old('long_description') }}</textarea>
			</div>
			

			<button type="submit" class="btn btn-primary">Registrar Producto</button>
			<a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>

		




      	
    	</form>
      
    </div>
  </div>
</div>
    

@endsection
