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

            <form class="" action="{{route('post.storenote')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
                  <div class="form-group">
                    <label for="name">Titulo:</label>
                    <input type="text" name="title" class="form-control" value="" autofocus>
                  </div>
                  <div class="form-group">
                    <label for="name">Contentido corto:</label>
                    <input type="text" name="content" class="form-control" value="" autofocus>
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
                    <textarea name="description" class="form-control editor"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="image">Imagen:</label>
                    <input type="file" name="image" class="form-control" value="">
                  </div>
                  <div class="form-check">
                    <label for="name">Destacado:</label>
                    <input type="checkbox" name="sticky" id="sticky" value="1"/>
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
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern codesample",
      "fullpage toc imagetools help"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
    nanospell_server:"php",
    browser_spellcheck: true,
    relative_urls: false,
    remove_script_host: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

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
          win.document.getElementById(field_name).value = url;
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
