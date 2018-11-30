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

      	<h2 class="title text-center">Registrar Nueva Categoria</h2>

      	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

      	<form enctype="multipart/form-data" method="post" action="{{ url('/admin/categories/') }}">	
      		{{ csrf_field() }}

      		
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group label-floating"> 
						<label class="control-label">Nombre</label>
						<input type="text" class="form-control" name="name" value="{{ old('name') }}">
					</div>
				</div>

				<div class="col-sm-6">
					<label class="control-label">Imagen de la categoria</label>
					<input type="file" name="image">
				</div>
			</div>
			

			
			<div class="form-group label-floating">
				<label class="control-label">Descripción</label>
				<textarea class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
			</div>
			

			<button type="submit" class="btn btn-primary">Registrar Categoria</button>
			<a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
      	
    	</form>
      
    </div>
  </div>
</div>
    

@endsection
