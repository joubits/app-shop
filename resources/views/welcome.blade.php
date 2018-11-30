@extends('layouts.app')

@section('title', 'Bienvenidos a '.config('app.name'))

@section('body-class', 'landing-page sidebar-collapse')

@section('styles')
<style type="text/css">

.team .row .col-md-4{
  margin-bottom: 1em;
}

.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 152px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
  
</style>

@endsection

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="title">Bienvenidos a Comercial Don Alfredo.</h1>
            <h4>Tenemos una amplia variedad de productos de primera necesidad distribuidos en diferentes categorías. Elija y compre lo que desee, lo contactaremos de inmediato para coordinar la entrega.</h4>
            <br>
            <!-- <a href="https://www.youtube.com/watch?v=_3SiHzTD7Sg" target="_blank" class="btn btn-danger btn-raised btn-lg">
              <i class="fa fa-play"></i> Mas info!
            </a> -->
          </div>
        </div>
      </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Por qué  comprar Online en {{ config('app.name') }}?</h2>
          <h5 class="description">Porque tenemos una relación muy completa entre productos de calidad, precios justos y cómodos y realizar sus pedidos cuando estés seguro.</h5>
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
      <h2 class="title">Visite nuestras Categorías</h2>
      
      <form class="form-inline justify-content-center" method="get" action="{{ url('/search') }}">
        <input type="text" name="query" class="form-control" placeholder="Que producto busca??" id="search" >
        <button class="btn btn-primary btn-fab btn-fab-mini btn-round" type="submit">
          <i class="material-icons">search</i>
        </button>
      </form>

      <div class="team">
        <div class="row">
          
          @foreach ($categories as $category)

          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="{{ $category->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">
                  <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                  <br>
                  <small class="card-description text-muted">{{ $category->category_name }}</small>
                </h4>
                <div class="card-body">
                  <p class="card-description">{{ $category->description }}
                  </p>
                </div>
                <div class="card-footer justify-content-center">
                  
                </div>
              </div>
            </div>
          </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="section section-contacts">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center title">Aun no se ha registrado?</h2>
          <h4 class="text-center description">Déjenos sus datos principales y podrá realizar sus pedidos a través de nuestra Tienda Virtual. Si no se decide y tiene alguna duda, por favor escríbamos y uno de nuestros asesores se pondrá en contacto inmediatamente</h4>
          <form class="contact-form" method="get" action="{{ url('/register') }}">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nombre</label>
                  <input name="name" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Email</label>
                  <input name="email" type="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised" type="submit">
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

@section('scripts')

<script src="{{ asset('/js/plugins/typeahead.bundle.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">

  $(function() {
    // inicializar typeahead para el input de la búsqueda
    var products = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // `states` is an array of state names defined in "The Basics"
      //local: ['hola1','hola2', 'prueba1', 'abcde']
      prefetch: '/products/json'
    });

    $('#search').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    },
    {
      name: 'products',
      source: products
    });
  });
  
</script>>

@endsection

@endsection
