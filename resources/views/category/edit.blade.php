@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{ route('category.index') }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>
 Volver</a>
       <a href="{{ url()->current() }}" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i>
      </a>
    </div>
  </ol>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <form class="" action="{{url('/category/'.$category->id)}}" method="post">
            {{csrf_field()}}
            <div class="card-header">
              Editar {{$category->name}}
            </div>
            <div class="card-block">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" autofocus>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit"class="btn btn-success"> Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
