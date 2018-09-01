@extends('layouts.app')

@section('body-class', 'login-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset ('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
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

            <form class="form-group" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf

              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Registro</h4>
                {{-- <div class="social-line">
                  <a href="#" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>

                  <a href="#" class="btn btn-just-icon btn-lin                  </a>k">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div> --}}
              </div>
              <p class="description text-center">Completa tus datos</p>
              <div class="card-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="material-icons">face</i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre" 
                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name'), $name }}" required autofocus>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                     <i class="material-icons">fingerprint</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Nombre de usuario" 
                  class="form-control" name="username" value="{{ old('username') }}" required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" type="email" placeholder="Correo electronico" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                  name="email" value="{{ old('email'), $email }}">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">phone</i>
                    </span>
                  </div>
                  <input id="phone" type="phone" placeholder="Teléfono" class="form-control" 
                  name="phone" value="{{ old('phone')}}" required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">class</i>
                    </span>
                  </div>
                  <input id="address" type="text" placeholder="Dirección" class="form-control" 
                  name="address" value="{{ old('address')}}" required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password"  placeholder="Contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                        </span>
                    </div>
                    <input id="password"  placeholder="Confirmar contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                </div>
            
              </div>
              <div class="input-group justify-content-center">
                <button href="#" type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Confirmar registro</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- incluir sub-vista footer --}}
    @include('includes.footer')
</div>
@endsection
