@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg')}}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">listado de productos</h2>
          </div>
        </div>
        <div class="features">
          <div class="row">
              <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo producto</a>

              <!--tabla-->
              <table class="table">
                  <thead>
                      <tr>
                          <th class="text-center"></th>
                          <th class="text-center">Nombre</th>
                          <th class="col-md-5 text-center">Descripción</th>
                          <th class="text-center">Categoría</th>
                          <th class="text-right">Precio</th>
                          <th class="text-right">Opciones</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($products as $product)
                          
                      <tr>
                          <td class="text-center">{{$product->id}}</td>
                          <td>{{ $product->name}}</td>
                          <td>{{ $product->description}}</td>
                          <td>{{ $product->category_name }}</td>
                          <td class="text-right">&euro; {{ $product->price}}</td>
                          <td class="td-actions text-right">
                              
                              <form method="POST" action="{{ url('/admin/products/'.$product->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                  <i class="fa fa-info"></i>
                                </a>
                                <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-warning btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del producto" class="btn btn-info btn-simple btn-xs">
                                  <i class="fa fa-image"></i>
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

              {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  
//incluir sub-vista footer
@include('includes.footer')
@endsection