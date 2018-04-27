@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create_category">
      Añadir categoria
      </button>
    </div>
  </ol>

  <div class="modal fade" id="create_category" tabindex="-1" role="dialog" aria-labelledby="create_categoryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="" action="{{route('category.store')}}" method="post">
      {{csrf_field()}}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nombre:</label>
              <input type="text" name="name" id="name" class="form-control" value="" autofocus>
          </div>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Categorias <span class="badge">{{$categories->count()}}</span>
          </div>
          <div class="card-block">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name }}</td>
                            <td>
                              <div class="btn-group btn-group-xs" role="group" aria-label="Toolbar with button groups">
                                <a href="{{ URL::to('category/'.$c->id.'/edit') }}" class="btn btn-warning pull-left">Editar</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $c->id] ]) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                              </div>
                            </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="7" class="warning"> No se han encontrado resultados.</td>
                        </tr>
                      @endforelse
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
