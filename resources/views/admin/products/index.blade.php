@extends('layouts.app')

@section('title','Bienvenido a su Tienda Virtual Online')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

<style>
.pagination 

</style>

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
      <div class="container">
        
      </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Listado de Productos</h2>
      <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">NUEVO PRODUCTO</a>
      <div class="team">
          <div class="row">

            <table class="table">
              <thead>
                  <tr>
                      <th class="text-center">Id</th>
                      <th width="20%">Nombre</th>
                      <th width="30%">Descripción</th>
                      <th>Categoría</th>
                      <th class="text-right">Precio</th>
                      <th class="text-center">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($products as $product)
                  <tr>
                      <td class="text-center">{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->description }}</td>
                      <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                      <td class="text-right">{{ $product->price }}</td>
                      <td class="td-actions text-right">
                          
                          <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                            <a href="#" rel="tooltip" title="Ver Detalle" class="btn btn-info btn-simple btn-sm">
                              <i class="fa fa-info"></i>
                            </a>
                            <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Ver Imágenes" class="btn btn-warning btn-simple btn-sm">
                              <i class="fa fa-image"></i>
                            </a>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-sm">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            
            {{ $products->links('pagination::bootstrap-4') }}    
            
          </div>
        </div>
      </div>
    </div>
</div>



@endsection


