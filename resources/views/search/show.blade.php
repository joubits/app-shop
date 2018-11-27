@extends('layouts.app')

@section('title','Detalle de Producto')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city-profile.jpg');"></div>
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile">
            <div class="avatar">
              <img src="/img/search.png" alt="Imagen para la búsqueda de productos" class="img-raised rounded-circle img-fluid">
            </div>
            <div class="name">
              <h3 class="title">Resultados de la Búsqueda</h3>

              @if(session('notification'))

                <div class="alert alert-success">
                  {{ session('notification') }}
                </div>
              @endif

            </div>
          </div>
        </div>
      </div>
      <div class="description text-center">
        <p>Se encontraron {{ $products->count() }} resultados para el término {{ $query }}</p>
      </div>

      
      <div class="team text-center">
        <h2 class="title ">Productos Disponibles</h2>
        <div class="row">
          
          @foreach ($products as $product)

          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">
                  <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                </h4>
                <div class="card-body">
                  <p class="card-description">{{ $product->description }}
                  </p>
                </div>
                <div class="card-footer justify-content-center">
                  
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row justify-content-center">
          {{ $products->links('pagination::bootstrap-4') }}
        </div>
      </div>
      



    </div>
  </div>
</div>



@endsection


