@extends('layouts.app')

@section('title', 'Listado de categorias')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg')}}')">
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">listado de categorías</h2>
          </div>
        </div>
        <div class="features">
          <div class="row">
              <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nueva categoría</a>

              <!--tabla-->
              <table class="table">
                  <thead>
                      <tr>
                          <th class="text-center">Nombre</th>
                          <th class="col-md-5 text-center">Descripción</th>
                          <th>Imagen</th>
                          <th class="text-right">Opciones</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $key => $category)
                          
                      <tr>
                          <td>{{ $category->name}}</td>
                          <td>{{ $category->description}}</td>
                          <td>
                            <img src="{{ $category->featured_image_url }}" height="50" alt="">
                          </td>
                          <td class="td-actions text-right">
                              
                              <form method="POST" action="{{ url('/admin/categories/'.$category->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="#" rel="tooltip" title="Ver categoría" class="btn btn-info btn-simple btn-xs">
                                  <i class="fa fa-info"></i>
                                </a>
                                <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoría" class="btn btn-warning btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
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

              {{ $categories->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  
//incluir sub-vista footer
@include('includes.footer')
@endsection