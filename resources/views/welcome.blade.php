@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'landing-page sidebar-collapse')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/shopStyle.css')}} ">
@endsection

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg')}}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Bienvenido a App Shop.</h1>
          <h4>Realiza pedidos en línea y te contactaremos para coordinar la entrega</h4>
          <br>
          <a href="#" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> ¿Cómo funciona?
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
            <h2 class="title">¿Por qué App Shop?</h2>
            <h5 class="description">Puedes revisar nuestra relación completa de productos, comparar precios y realizar tus pedidos cuando estés seguro.</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Atendemos tus dudas</h4>
                <p>Atendemos rápidamente cualquier consulta que tengas via chat, No estás sólo, sino que siempre 
                  estamos atentos a tus inquietudes.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Pago seguro</h4>
                <p>Todo pedido que realices será confirmado a través de una llamada. Si no confías en los
                  pagos en línea puedes pagar contra entrega el valor acordado.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">información privada</h4>
                <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario.
                  Nadie más tiene acceso a esta información.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section text-center">
        <h2 class="title">Visita nuestras categorías</h2>
        <br>
        
        <form class="form-inline d-flex justify-content-center" method="GET" action="{{ url('/search') }}">
          <input type="text" placeholder="¿Qué producto buscas?" class="form-control"
          name="query" id="search">
          <button class="btn btn-primary btn-just-icon" type="submit">
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
                    <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoría
                    {{ $category->name }}" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">
                    <a href="{{ url('/categories/'.$category->id)}}">{{$category->name}}</a>
                    <br>
                    <small class="card-description text-muted">{{ $category->Category_name }}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">{{$category->description}} </p>
                  </div>
                  
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">¿Aún no te has registrado?</h2>
            <h4 class="text-center description">Regístrate ingresando tus datos básicos, y podrás realizar tus pedidos a
              través de nuestro carrito de compras. Si aún no te decides, de todas formas, con tu cuenta
              de usuario podrás hacer todas tus consultas sin compromiso.</h4>
            <form class="contact-form" method="get" action="{{ route('register') }}">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="input" class="form-control" name="name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo electrónico</label>
                    <input type="email" class="form-control" name="email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised">
                    Iniciar registro
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- incluir sub-vista footer --}}
@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function(){
          // constructs the suggestion engine
          var products = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // `states` is an array of state names defined in "The Basics"
            prefetch: '{{ url("products/json") }}'
          });
          
          //inicializar typeahead sobre nuestro input de búsqueda
          $('#search').typeahead({
            hint: true,
            highlight: true,
            minLenght: 1
          }, {
            name: 'products',
            source: products
          });
        });
    </script>
@endsection
