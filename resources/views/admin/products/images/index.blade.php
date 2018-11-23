@extends('layouts.app')

@section('title','Imágenes de productos')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

<style>
.pagination 

</style>

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Imagen de producto "{{ $product->name }}</h2>
      <form method="post" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="photo" required>
        <button type="submit" class="btn btn-primary btn-round">Subir Nueva Imagen</button>
        <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver a listado de Productos</a>
      </form>
      <hr/>

      <div class="row">
      @foreach($images as $image )
        <div class="col-md-4">
          <div class="card card-default">
            <div class="card-body">
              <img src="{{ $image->url }}" width="250" height="250">
              <form method="post" action="">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <input type="hidden"  name="image_id" value="{{ $image->id }}">
                <button type="submit" class="btn btn-danger btn-round">Eliminar</button>
                
                @if($image->featured)
                  <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen Destacada">
                    <i class="material-icons">favorite</i>
                  </button>

                @else
                  <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id)  }}" class="btn btn-primary btn-fab btn-fab-mini btn-round" rel="tooltip" title="Click para destacar Imagen">
                    <i class="material-icons">favorite</i>
                  </a>
                @endif
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
      
    </div>
  </div>
</div>



@endsection


