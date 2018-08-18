@extends('layouts.app')

@section('title', 'Imágenes de productos')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg')}}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Imágenes de productos "{{ $product->name }}" </h2>

            <form method="POST" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="file" name="photo" required>
              <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
              <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver al listado de productos</a>
            </form>
            

            <hr>

            <div class="row">
              @foreach ($images as $image)
              <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                      <img src="{{ $image->url }}" alt="" width="250">
                      <form method="POST" action="">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <input type="hidden" name="image_id" value="{{ $image->id }}">
                          <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                      </form>
                      
                    </div>
                </div>  
              </div>
              @endforeach
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  
//incluir sub-vista footer
@include('includes.footer')
@endsection