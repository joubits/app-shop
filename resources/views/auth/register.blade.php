@extends('layouts.app')

@section('body-class', 'login-page sidebar-collapse')

@section('content')

<div class="page-header header-filter" style="background-image: url('{{ asset('img/bg7.jpg') }}'); background-size: cover; background-position: top center;">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <div class="card card-login">
          
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form class="form" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
            <div class="card-header card-header-primary text-center">
              <h4 class="card-title">Registro</h4>
              <!-- <div class="social-line">
                <a href="#" class="btn btn-just-icon btn-link">
                  <i class="fa fa-facebook-square"></i>
                </a>
                <a href="#" class="btn btn-just-icon btn-link">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="#" class="btn btn-just-icon btn-link">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div> -->
            </div>
            <p class="description text-center">Completar los siguientes campos</p>
            <div class="card-body">
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="material-icons">face</i>
                      </span>
                  </div>
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $name) }}" placeholder="First Name..." required autofocus>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">mail</i>
                  </span>
                </div>
                
                <input id="email" type="email" placeholder="Email..." class="form-control" name="email" value="{{ old('email',$email) }}" required autofocus>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">phone</i>
                  </span>
                </div>
                
                <input id="phone" type="phone" placeholder="Teléfono" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">class</i>
                  </span>
                </div>
                
                <input id="address" type="text" placeholder="Dirección" class="form-control" name="address" value="{{ old('address') }}" required autofocus>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password..." required>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Re-Password..." required>
              </div>
              
            </div>
            <br>
            <br>
            <br>
            <div class="footer text-center">
              <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Registrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

