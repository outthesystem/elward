@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{url('/post/createnote')}}" class="btn btn-success"> Crear nota</a>
      <a href="{{url('/post/create')}}" class="btn btn-success"> Crear evento</a>
    </div>
  </ol>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Publicaciones <span class="badge">{{$posts->count()}}</span>
          </div>
          <div class="card-block">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Categoria</th>
                            <th>F inicio - Hora</th>
                            <th>Lugar</th>
                            <th>Tipo de entrada</th>
                            <th>Precio</th>
                            <th>Web/Facebook</th>
                            <th>Email</th>
                            <th>Aprobado</th>
                            <th>Nota / Destacado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $c)
                        <tr
                        class="
                        @if ($c->note == 1)
                          table-primary
                        @endif
                        "
                        >
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->title }}</td>
                            <td>
                              @if ($c->category != null)
                              {{$c->category->name}}
                              @endif
                            </td>
                            <td>{{ $c->date_init }} - {{ $c->hour }}</td>
                              <td>{{ $c->place }}</td>
                              <td>{{ $c->entrytype }}</td>
                              <td>${{ number_format($c->price, 2) }}</td>
                              <td>{{ $c->webfacebook }}</td>
                              <td>{{ $c->email }}</td>
                              <td>
                                @if ($c->approved == 1)
                                  Si
                                  @else
                                    No
                                @endif
                              </td>
                              <td>
                                @if ($c->note == 1)
                                  Si
                                  @else
                                    No
                                @endif
                                /
                                @if ($c->sticky == 1)
                                  Si
                                  @else
                                    No
                                @endif
                              </td>
                              <td>
                              <div class="btn-group btn-group-xs" role="group" aria-label="Toolbar with button groups">
                                <a href="{{ URL::to('post/'.$c->id.'/edit') }}" class="btn btn-warning pull-left">Editar</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $c->id] ]) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                              </div>
                            </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="11" class="warning"> No se han encontrado resultados.</td>
                        </tr>
                      @endforelse
                    </tbody>
                </table>
                    {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
