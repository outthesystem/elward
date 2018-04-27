@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{url('/posts')}}" class="btn btn-info"> Volver</a>
    </div>
  </ol>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Crear publicacion
          </div>
          <div class="card-block">

            <form class="" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
                  <div class="form-group">
                    <label for="name">Titulo:</label>
                    <input type="text" name="title" class="form-control" value="" autofocus>
                  </div>
                  <div class="form-group">
        							<label for="category_id">Selecciona una categoria</label>
        							<select class="form-control" name="category_id" title="Selecciona una categoria">
        							  @foreach ($categories as $c)
        									<option value="{{$c->id}}">{{$c->name}}</option>
        							  @endforeach
        							</select>
        					</div>
                  <div class="form-group">
                    <label for="description">Descripcion:</label>
                    <textarea name="description" id="editor"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="date_init">Fecha de inicio:</label>
                    <input type="date" name="date_init" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="date_init">Fecha de finalizacion:</label>
                    <input type="date" name="date_end" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="hour">Hora de inicio:</label>
                    <input type="text" name="hour" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="hour">Hora finalizacion:</label>
                    <input type="text" name="hour_end" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="place">Lugar:</label>
                    <input type="text" name="place" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="entrytype">Tipo de entrada:</label>
                    <select  name="entrytype" class="form-control"  required>
      								<option value="Entrada gratuita" >Entrada gratuita</option>
      								<option value="Entrada a la gorra" >Entrada a la gorra</option>
      								<option value="Precio unico" >Precio unico</option>
      								<option value="Entrada desde..." >Entrada desde...</option>
      									<option value="Bono contribucion" >Bono contribucion</option>
      							</select>
                  </div>
                  <div class="form-group">
                    <label for="price">Precio:</label>
                    <input type="number" name="price" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="webfacebook">Web/Facebook:</label>
                    <input type="text" name="webfacebook" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="image">Imagen:</label>
                    <input type="file" name="image" class="form-control" value="">
                  </div>
                  <div class="form-check">
                    <label for="approved">Aprobado:</label>
                    <input type="checkbox" name="approved" id="approved" value="1"/>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" name="button">Guardar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
  </div>

  <script>
  			ClassicEditor
  				.create( document.querySelector( '#editor' ) )
  				.then( editor => {
  					console.log( editor );
  				} )
  				.catch( error => {
  					console.error( error );
  				} );
  		</script>
@endsection
