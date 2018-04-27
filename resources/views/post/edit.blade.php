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
            Editar publicacion
          </div>
          <div class="card-block">
            <form class="" action="{{url('/post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
                  <div class="form-group">
                    <label for="name">Titulo:</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}" autofocus>
                  </div>
                  <div class="form-group">
        							<label for="category_id">Selecciona una categoria</label>
        							<select class="form-control" name="category_id" title="Selecciona una categoria">
                        @if ($post->category != null)
                        <option value="{{$post->category_id}}" selected>{{$post->category->name}}</option>
                        @else

                        @endif
                        <option value="">-------------</option>

        							  @foreach ($categories as $c)

        									<option value="{{$c->id}}">{{$c->name}}</option>
        							  @endforeach
        							</select>
        					</div>
                  <div class="form-group">
                    <label for="name">Contentido corto:</label>
                    <input type="text" name="content" class="form-control" value="{{$post->content}}" autofocus>
                  </div>
                  <div class="form-group">
                    <label for="description">Descripcion:</label>
                    <textarea name="description" class="form-control editor">{{$post->description}}</textarea>
                  </div>
                @if ($post->note == 1)
                  @else
                    <div class="form-group">
                      <label for="date_init">Fecha de inicio:</label>
                      <input type="date" name="date_init" class="form-control" value="{{$post->date_init}}">
                    </div>
                    <div class="form-group">
                      <label for="date_init">Fecha de finalizacion:</label>
                      <input type="date" name="date_end" class="form-control" value="{{$post->date_end}}">
                    </div>
                    <div class="form-group">
                      <label for="hour">Hora de inicio:</label>
                      <input type="text" name="hour" class="form-control" value="{{$post->hour}}">
                    </div>
                    <div class="form-group">
                      <label for="hour">Hora finalizacion:</label>
                      <input type="text" name="hour_end" class="form-control" value="{{$post->hour_end}}">
                    </div>
                    <div class="form-group">
                      <label for="place">Lugar:</label>
                      <input type="text" name="place" class="form-control" value="{{$post->place}}">
                    </div>
                    <div class="form-group">
                      <label for="entrytype">Tipo de entrada:</label>
                      <input type="text" name="entrytype" class="form-control" value="{{$post->entrytype}}">
                    </div>
                    <div class="form-group">
                      <label for="price">Precio:</label>
                      <input type="number" name="price" class="form-control" value="{{$post->price}}">
                    </div>
                    <div class="form-group">
                      <label for="webfacebook">Web/Facebook:</label>
                      <input type="text" name="webfacebook" class="form-control" value="{{$post->webfacebook}}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="text" name="email" class="form-control" value="{{$post->email}}">
                    </div>
                @endif
                  <div class="form-group">
                    <label for="image">Imagen:</label>
                    <input type="text" name="image" class="form-control" value="{{$post->image}}">
                    <p class="text-danger">sube la imagen a <a href="http://imgur.com" target="_blank">IMGUR</a> y pega el link</p>
                    <img src="{{$post->image}}" alt="">
                  </div>
                            @if ($post->note == 1)
                            @else
                  <div class="form-check">
                    <label for="approved">Aprobado:</label>
                    @if ($post->approved == 1)
                      <input type="checkbox" name="approved" id="approved" value="1" checked/>
                      @else
                        <input type="checkbox" name="approved" id="approved" value="1"/>
                    @endif
                  </div>

                    @endif
                  <div class="form-check">
                    <label for="name">Destacado:</label>
                    @if ($post->sticky == 1)
                      <input type="checkbox" name="sticky" id="sticky" value="1" checked/>
                      @else
                        <input type="checkbox" name="sticky" id="sticky" value="1"/>

                    @endif
                  </div>
                  <button type="submit" class="btn btn-success">Guardar</button>
                </form>

                </div>
                <div class="card-footer">
                </div>
          </div>
        </div>
      </div>
  </div>

  <script>
  var editor_config = {
    path_absolute : "/",
    entity_encoding : "raw",
    selector: "textarea.editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "emoticons template paste textcolor colorpicker textpattern codesample media",
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
    nanospell_server:"php",
    browser_spellcheck: true,
    relative_urls: false,
    remove_script_host: false,
    file_browser_callback : function(description, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('description')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('description')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinymce.activeEditor.windowManager.open({
        file: '<?= route('elfinder.tinymce4') ?>',// use an absolute path!
        title: 'File manager',
        width: 900,
        height: 450,
        resizable: 'yes'
      }, {
        setUrl: function (url) {
          win.document.getElementById(description).value = url;
        }
      });
    }
  };

  tinymce.init(editor_config);
</script>
<script>
  {!! \File::get(base_path('vendor/barryvdh/laravel-elfinder/resources/assets/js/standalonepopup.min.js')) !!}
</script>
@endsection
