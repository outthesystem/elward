@extends('layouts.app')

@section('content')

    <ol class="breadcrumb">
      <div class="btn-group" role="group" aria-label="Button group">
        <a href="{{ route('users.index') }}" class="btn btn-info">Usuarios</a>
        <a href="{{ route('permissions.index') }}" class="btn btn-primary">Permisos</a>
        <a href="{{ route('roles.create') }}" class="btn btn-success">Añadir rol</a>
      </div>
    </ol>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              Roles <span class="badge">{{$roles->count()}}</span>
            </div>
            <div class="card-block">
              <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Rol</th>
                              <th>Permisos</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($roles as $role)
                          <tr>
                              <td>{{ $role->name }}</td>
                              <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                              <td>
                                <div class="btn-group btn-group-xs" role="group" aria-label="Toolbar with button groups">
                                  <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-warning pull-left">Editar</a>
                                  {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                  {!! Form::close() !!}
                                </div>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
