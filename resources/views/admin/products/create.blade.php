@extends('layouts.app')

@section('title', 'Formulario de registro')

@section('body-class', 'profile-page sidebar-collapse')


@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg')}}')">
</div>

  <div class="main main-raised">
    <div class="container">

      <div class="section">
        <h2 class="title text-center">Registrar nuevo producto</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ url('/admin/products') }}">
            {{ csrf_field() }}

          <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Precio del producto</label>
                    <input type="number" class="form-control" name="price">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Descripción corta</label>
                  <input type="text" class="form-control" name="description" value="description">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Categoría de producto</label>
                  <select class="form-control" name="category_id" id="">
                    <option value="0">General</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
          </div>
            
          <textarea name="long_description" placeholder="Descripción extensa del  producto" rows="5" class="form-control"></textarea>

          <button class="btn btn-primary">Registrar producto</button>
          
        </form>
      </div>

    </div>
  </div>

{{-- incluir sub-vista footer --}}
@include('includes.footer')
@endsection
