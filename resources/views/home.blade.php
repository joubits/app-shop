@extends('layouts.app')

@section('title','Tienda Virtual - Dashboard')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
</div>
<div class="main main-raised">

    <div class="container">
        <div class="section">

            <h2 class="title text-center">Dashboard</h2>

            @if(session('notification'))

              <div class="alert alert-success">
                {{ session('notification') }}
              </div>
            @endif

            <ul class="nav nav-pills nav-pills-icons" role="tablist">
                <!--
                    color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                -->
                <li class="nav-item">
                    <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Carrito de Compras
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Pedidos Realizados
                    </a>
                </li>
            </ul>
            <hr>
            <p>Su carrito de compras tiene {{ auth()->user()->cart->details->count() }} productos. </p>

            


            <table class="table">
              <thead>
                  <tr>
                      <th class="text-center">Img</th>
                      <th width="20%">Nombre</th>
                      <th width="30%">Precio</th>
                      <th>Cantidad</th>
                      <th class="text-right">Subtotal</th>
                      <th class="text-center">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach(auth()->user()->cart->details as $detail)
                  <tr>
                      <td class="text-center"><img src="{{ $detail->product->featured_image_url }}" height="50px"></td>
                      <td><a href="{{ url('/products/'.$detail->product->id) }}">{{ $detail->product->name }}</a></td>
                      <td>{{ $detail->product->price }}</td>
                      <td>{{ $detail->quantity }}</td>
                      <td class="text-right">$ {{ ($detail->product->price)* $detail->quantity }}</td>
                      <td class="td-actions text-right">
                          
                          <form method="post" action="{{ url('/cart') }}">
                            <a href="{{ url('products/'.$detail->product->id) }}" rel="tooltip" title="Ver Detalle" class="btn btn-info btn-simple btn-sm">
                              <i class="fa fa-info"></i>
                            </a>
                            
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="car_detail_id" value="{{ $detail->id }}">
                            <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-sm">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>

            <p><strong>El total a pagar es: </strong> ${{ auth()->user()->cart->total }}</p>

            <div class="text-center">
              <form method="post" action="{{ url('/order') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary btn-round">
                  <i class="material-icons">done</i> Realizar Pedido.
                </button>
              </form>
            </div>
      
        </div>
    </div>
</div>
    

@endsection

