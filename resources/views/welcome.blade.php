@extends('layouts.app')

@section('title','Bienvenido a su Tienda Virtual Online')

@section('body-class', 'landing-page sidebar-collapse')

@section('styles')
<style type="text/css">

.team .row .col-md-4{
  margin-bottom: 1em;
}
  
</style>

@endsection

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="title">Bienvenido a su Tienda Virtual.</h1>
            <h4>Realice sus pedidos de todos los productos disponibles y nosotros lo contactaremos para coordinar la entrega.</h4>
            <br>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
              <i class="fa fa-play"></i> Mas info!
            </a>
          </div>
        </div>
      </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Por qué Tienda Virtual Online?</h2>
          <h5 class="description">Porque tenemos una relación muy completa entre productos, comparar precios, y realizar sus pedidos cuando estés seguro.</h5>
        </div>
      </div>
      <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-info">
                <i class="material-icons">chat</i>
              </div>
              <h4 class="info-title">Consultas o Sugerencias</h4>
              <p>Siempre estaremos pendientes de sus consultas y dudas via Chat. Estamos para brindarle el mejor servicio</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-success">
                <i class="material-icons">verified_user</i>
              </div>
              <h4 class="info-title">Pago Seguro</h4>
              <p>Puede escoger cualquier producto y en la cantidad disponible en stock, ya no se debe preocupar por el resto. Nosotros confirmamos su pedido con una llamada y el pago lo realiza online o cuando llegue a la puerta de su casa.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-danger">
                <i class="material-icons">fingerprint</i>
              </div>
              <h4 class="info-title">Información Privada</h4>
              <p>Los pedidos que realices son seguros y nadie más debe conocerlas que tú a través del panel de usuario. No tema por su privacidad, está en los mejores manos y no se divulgará</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section text-center">
      <h2 class="title">Productos Disponibles</h2>
      <div class="team">
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
                  <br>
                  <small class="card-description text-muted">{{ $product->category->name }}</small>
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
    <div class="section section-contacts">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center title">Aun no se ha registrado?</h2>
          <h4 class="text-center description">Déjenos sus datos principales y podrá realizar sus pedidos a través de nuestra Tienda Virtual. Si no se decide y tiene alguna duda, por favor escríbamos y uno de nuestros asesores se pondrá en contacto inmediatamente</h4>
          <form class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nombre</label>
                  <input type="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Email</label>
                  <input type="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleMessage" class="bmd-label-floating">Mensaje</label>
              <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
            </div>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised">
                  Enviar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
