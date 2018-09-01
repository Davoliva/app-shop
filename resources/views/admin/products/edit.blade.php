@extends('layouts.app')

@section('title', 'Formulario de registro')

@section('body-class', 'profile-page sidebar-collapse')


@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset ('img/profile_city.jpg')}}')">
</div>

  <div class="main main-raised">
    <div class="container">

      <div class="section">
        <h2 class="title text-center">Editar producto seleccionado</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
        <form method="POST" action="{{ url('/admin/products/' .$product->id.'/edit') }}">
            {{ csrf_field() }}

          <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Precio del producto</label>
                    <input type="number" step="0.01" class="form-control" name="price" value="{{ $product->price }}">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Descripción corta</label>
                  <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Categoría de producto</label>
                  <select class="form-control" name="category_id" id="">
                    <option value="0">General</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == old('category_id',$product->category_id)) selected @endif>
                      {{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
          </div>
            

            
          <textarea name="long_description" placeholder="Descripción extensa del  producto" rows="5" class="form-control">{{ $product->long_description }}</textarea>

          <button class="btn btn-primary">Guardar cambios</button>
          <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
          
        </form>
      </div>

    </div>
  </div>

//incluir sub-vista footer
@include('includes.footer')
@endsection
