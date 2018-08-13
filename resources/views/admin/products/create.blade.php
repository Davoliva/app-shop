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
            
          <div class="form-group label-floating">
              <label class="control-label">Descripción corta</label>
              <input type="text" class="form-control" name="description">
          </div>
            
          <textarea name="long_description" placeholder="Descripción extensa del  producto" rows="5" class="form-control"></textarea>

          <button class="btn btn-primary">Registrar producto</button>
          
        </form>
      </div>

    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
@endsection
