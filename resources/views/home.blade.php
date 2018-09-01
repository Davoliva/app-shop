@extends('layouts.app')

@section('title', 'App Shop | Dashboard')

@section('body-class', 'profile-page sidebar-collapse')


@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg')}}')">
</div>

  <div class="main main-raised">
    <div class="container">

      <div class="section">
        <h2 class="title text-center">Dashboard</h2>

        @if (session('notification'))
            <div class="alert alert-success" role="alert">
                {{ session('notification') }}
            </div>
        @endif

        {{-- Nav pills --}}
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <!--
                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
            -->
            <li class="nav-item">
                <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Carrito de compras
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                    <i class="material-icons">list</i>
                    Pedidos realizados
                </a>
            </li>
        </ul>
        <hr>
        <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.</p>
        
        <!--tabla-->
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left"></th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-right">SubTotal</th>
                    <th class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach (auth()->user()->cart->details as $detail)
                    
                <tr>
                    <td class="text-left">
                        <img src="{{ $detail->product->featured_image_url }}" height="50px" alt="">
                    </td>
                    <td class="text-center">
                        <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                    </td>
                    <td class="text-center">$; {{ $detail->product->price}}</td>
                    <td class="text-center">{{ $detail->quantity }}</td>
                    <td class="text-right">${{ $detail->quantity * $detail->product->price }}</td>
                    <td class="td-actions text-right">
                        
                        <form method="POST" action="{{ url('/cart') }}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">

                          <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-info"></i>
                          </a>
                          <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                        
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

        
        <div class="text-center">
            <form method="POST" action="{{ url('/order') }}">
                {{ csrf_field() }}
                
                <button class="btn btn-primary btn-round">
                    <i class="material-icons">done</i> Realizar pedido
                </button>
            </form>
        </div>

      </div>

    </div>
  </div>
  
{{-- incluir sub-vista footer --}}
@include('includes.footer')
@endsection



