@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('body-class', 'profile-page sidebar-collapse')


@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg')}}')">
</div>

  <div class="main main-raised">
    <div class="container">

      <div class="section">
        <h2 class="title text-center">Editar categoría seleccionado</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ url('/admin/categories/' .$category->id.'/edit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

          <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoría</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                </div>
            </div>
            <div class="col-sm-6">
              <label class="control-label">Imagen de la categoria</label>
              <input type="file" name="image">
              @if ($category->image)
              <p class="help-block">Subir sólo si decea reemplazar la imagen actual</p>
              <a href="{{ asset('/images/categories/'.$category->image)}}" target="_blank">Imagen actual</a>
              @endif
            </div>
          </div>
            
          <textarea name="description" placeholder="Descripción extensa de la categoría" 
          rows="5" class="form-control">{{ old('description', $category->description) }}</textarea>

          <button class="btn btn-primary">Guardar cambios</button>
          <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
          
        </form>
      </div>

    </div>
  </div>

//incluir sub-vista footer
@include('includes.footer')
@endsection
