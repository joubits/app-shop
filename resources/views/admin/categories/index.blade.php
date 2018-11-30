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
      <h2 class="title">Listado de Categorias</h2>
      <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">NUEVA CATEGORIA</a>
      <div class="team">
        @if(session('notification'))

          <div class="text-left alert alert-success">
            {{ session('notification') }}
          </div>
        @endif
          <div class="row">
            
            <table class="table">
              <thead>
                  <tr>
                      <th width="20%">Nombre</th>
                      <th width="30%">Descripción</th>
                      <th width="20%">Imagen</th>
                      <th class="text-center">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($categories as $category)
                  <tr>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->description }}</td>
                      <td>
                        <img src="{{ $category->featured_image_url }}" height="50px">
                      </td>
                      <td class="td-actions text-right">
                          
                          <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                            
                            <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-sm">
                                <i class="fa fa-edit"></i>
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
            
            {{ $categories->links('pagination::bootstrap-4') }}    
            
          </div>
        </div>
      </div>
    </div>
</div>



@endsection


