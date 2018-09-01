@extends('layouts.app')

@section('title', 'Crear categoría')

@section('body-class', 'profile-page sidebar-collapse')


@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg')}}')">
</div>

  <div class="main main-raised">
    <div class="container">

      <div class="section">
        <h2 class="title text-center">Registrar nuevo categoría</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

          <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoría</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Imagen de la categoria</label>
                <input type="file" name="image">
            </div>
          </div>
            
          <textarea name="description" placeholder="Descripción de la categoría" 
          rows="5" class="form-control">{{ old('description') }}</textarea>

          <button class="btn btn-primary">Registrar categoría</button>
          <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
          
        </form>
      </div>

    </div>
  </div>

{{-- incluir sub-vista footer --}}
@include('includes.footer')
@endsection
