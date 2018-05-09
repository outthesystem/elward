<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{secure_asset('public/frontend/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" href="{{secure_asset('public/frontend/img/favicon.png')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="mobile-web-app-capable" content="yes">
	<title>El Ward Oficial</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<link rel="manifest" href="{{secure_asset('public/manifest.json')}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{secure_asset('public/frontend/img/favicon148.png')}}">
<meta name="theme-color" content="#ffffff">
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

	<!-- CSS Files -->
    <link href="{{secure_asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('public/frontend/css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
		<script src="{{ secure_asset('public/js/pace.min.js') }}"></script>

	<style media="screen">
	.pace .pace-progress {
	  background: #5cf284;
	  position: fixed;
	  z-index: 2000;
	  top: 0;
	  /*right: 100%;*/
	  width: 100%;
	  height: 2px;
		-webkit-box-shadow: 0px 4px 12px -2px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 4px 12px -2px rgba(0,0,0,0.75);
	box-shadow: 0px 4px 12px -2px rgba(0,0,0,0.75); }

	</style>


</head>

<body class="blog-posts" style="background-color:white;font-family: 'Open Sans', sans-serif;">
	<nav class="navbar navbar-success navbar-color-on-scroll navbar-fixed-top" color-on-scroll="200" role="navigation">
							<div class="container">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-transparent">
										<span class="sr-only">Toggle navigation</span>
										<i class="fas fa-angle-left"></i>
									</button>
									<a class="navbar-brand" href="https://www.facebook.com/El-Ward-1912841569026994"><img src="{{secure_asset('public/img/logo.png')}}" alt="" class="img-responsive" style="max-width:130px; margin-top: -22px;"><div class="ripple-container"></div></a>
								</div>

								<div class="collapse navbar-collapse" id="example-navbar-transparent">
									<ul class="nav navbar-nav navbar-right">
										<li class="active">

			                                <a href="{{url('/')}}">
			                                    <i class="far fa-calendar"></i>
			                                    Eventos
			                                </a>
			                            </li>
																	<li>
																		<a href="{{url('/')}}">
																				<i class="far fa-edit"></i>
																				Entradas
																		</a></li>

																		    @guest
																		    <li>
																		    	<a href="{{url('/login')}}">
																				<i class="fas fa-sign-in-alt"></i>
																				Ingresar
																		</a></li>
        @else

																		@endguest


									</ul>
								</div>
							</div>
						</nav>

		@if ($notes->count() == 0)
			@else
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10000" style="margin-top:-50px;">
					<div class="carousel slide" data-ride="carousel">

						<!-- Indicators -->
						<ol class="carousel-indicators">

								@foreach ($notes as $indexKey => $n)
									<li data-target="#carousel-example-generic" data-slide-to="{{$indexKey}}"
									@if ($indexKey == '0')
										class="active"

									@endif
									></li>
								@endforeach
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							@foreach ($notes as $indexKey => $n)
								<div class="item @if ($indexKey == '0')
								active
								@endif">
									<div class="page-header header-filter" style="background-image: url('{{$n->image}}');">
										<div class="container">
											<div class="row">
												<div class="col-md-12 text-left" style="margin-top:-100px;">
												<center>	<h1 class="title" style="font-family: 'Open Sans', sans-serif;">{{$n->title}}</h1>
													<h4 style="font-family: 'Open Sans', sans-serif;">{{$n->content}}</h4>
													<br />

													<div class="buttons">
														<a href="{{'post/'.$n->id}}" class="btn btn-primary btn-lg" style="margin-top:-10px;">
															Ver mas...
														</a>
													</div>
												</center>
												</div>
											</div>
										</div>
							        </div>

								</div>
							@endforeach

						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<i class="material-icons">keyboard_arrow_left</i>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<i class="material-icons">keyboard_arrow_right</i>
						</a>
					</div>
				</div>
		@endif

<!-- Navbar will come here -->
<div class="modal fade" id="posts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Crea tu evento</h4>
			</div>
			<div class="modal-body">
				<form class="" action="{{route('front.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group label-floating">
							<label class="control-label">Titulo</label>
				    	<input type="text" value="" name="title" class="form-control" required autofocus/>
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Descripcion</label>
				     <textarea class="form-control" name="description" placeholder="" rows="5" required></textarea>
					</div>
					<div class="form-group">
							<label class="control-label">Selecciona una categoria</label>
							<select class="selectpicker" data-style="btn-success" name="category_id" data-live-search="true" title="Selecciona una categoria" required>
							  @foreach ($categories as $c)
									<option value="{{$c->id}}" data-tokens="{{$c->name}}">{{$c->name}}</option>
							  @endforeach
							</select>
					</div>
					<div class="form-group">
	            <label class="label-control">Selecciona una fecha de inicio:</label>
	            <input type="text" name="date_init" class="form-control datetimepicker1" value="{{Carbon\Carbon::now()}}" required/>
	        </div>

					<div class="form-group">
	            <label class="label-control">Selecciona una fecha final</label>
	            <input type="text" name="date_end" class="form-control datetimepicker3" value="{{Carbon\Carbon::now()}}" required/>
	        </div>
					<div class="form-group">
							<label class="control-label">Hora de inicio:</label>
				    	<input type="text" value="" name="hour" class="form-control datetimepicker2" required/>
					</div>

					<div class="form-group">
							<label class="control-label">Hora de finalizacion:</label>
				    	<input type="text" value="" name="hour_end" class="form-control datetimepicker4" required/>
					</div>
					<div class="form-group label-floating">
							<label class="control-label">Lugar</label>
				    	<input type="text" value="" name="place" class="form-control" required/>
					</div>
					<div class="form-group">
							<label class="control-label">Tipo de entrada</label>

							<select class="selectpicker" data-style="btn-success"  name="entrytype" data-live-search="true" title="Selecciona un tipo de entrada" required>
								<option value="Entrada gratuita" data-tokens="Entrada gratuita">Entrada gratuita</option>
								<option value="Entrada a la gorra" data-tokens="Entrada gratuita">Entrada a la gorra</option>
								<option value="Precio unico" data-tokens="Precio unico">Precio unico</option>
								<option value="Entrada desde..." data-tokens="Entrada desde...">Entrada desde...</option>
									<option value="Bono contribucion" data-tokens="Bono contribucion">Bono contribucion</option>
							</select>
					</div>
					<div class="form-group label-floating">
							<label class="control-label">Precio </label>
				    	<input type="number" value="" placeholder="Precio" name="price" class="form-control" required/>
					</div>
					<div class="form-group label-floating">
							<label class="control-label">Web / Facebook</label>
				    	<input type="text" value="" placeholder="" name="webfacebook" class="form-control" required/>
					</div>
					<div class="form-group label-floating">
							<label class="control-label">Email de contacto</label>
				    	<input type="text" value="" placeholder="" name="email" class="form-control"/>
					</div>
					<div class="form-group label-floating">
						<div class="fileinput fileinput-new text-center" data-provides="fileinput">
						   <div class="fileinput-new thumbnail img-raised">
							<img src="{{secure_asset('public/frontend/img/image_placeholder.jpg')}}" alt="...">
						   </div>
						   <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
						   <div>
							<span class="btn btn-raised btn-round btn-default btn-file">
							   <span class="fileinput-new">Selecciona tu imagen</span>
							   <span class="fileinput-exists">Cambiar</span>
							   <input type="file" name="image" required/>
							</span>
						        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
						        <i class="fa fa-times"></i> Eliminar</a>
						   </div>
						</div>
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Cerrar</button>
				<button type="submit"  class="btn btn-success btn-simple" id="search">Enviar</button>
			</form>
			</div>
		</div>
	</div>
</div>

<!-- end navbar -->
<br>
<br>
<div class="main">
		<div class="container" >
      <div class="section">

					@if(session()->has('message'))

							<div class="alert alert-success">
				            <div class="container">
								<div class="alert-icon">
									<i class="material-icons">check</i>
								</div>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="material-icons">clear</i></span>
								</button>
				            	<b>Felicitaciones:</b> {{ session()->get('message') }}

				            </div>
				        </div>
					@endif
        @yield('contentapp')

      </div>
		</div>
	</div>

	<footer class="footer footer-white footer-big">
		            		<div class="container">



		            			<ul class="social-buttons">


												<li>
													<a href="https://www.facebook.com/El-Ward-1912841569026994" class="btn btn-just-icon btn-simple btn-facebook">
														<i class="fab fa-facebook"></i>
													</a>
												</li>
		            			</ul>

		            			<div class="copyright pull-center" style="margin-top:-25px;">
												<h5 style="font-family: 'Open Sans', sans-serif;">cuenta.elwardoficial@gmail.com</h5>

		            			</div>
		            		</div>
		            	</footer>
									@yield('modals')
</body>
	<!--   Core JS Files   -->
	<script src="{{secure_asset('public/frontend/js/jquery.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
	if ('serviceWorker' in navigator) {
	window.addEventListener('load', function() {
		navigator.serviceWorker.register('{{secure_asset('public/sw.js')}}').then(function(registration) {
			// Registration was successful
			console.log('ServiceWorker registration successful with scope: ', registration.scope);
		}).catch(function(err) {
			// registration failed :(
			console.log('ServiceWorker registration failed: ', err);
		});
	});
}
window.addEventListener('beforeinstallprompt', function(e) {
  // beforeinstallprompt Event fired

  // e.userChoice will return a Promise.
  // For more details read: https://developers.google.com/web/fundamentals/getting-started/primers/promises
  e.userChoice.then(function(choiceResult) {

    console.log(choiceResult.outcome);

    if(choiceResult.outcome == 'dismissed') {
      console.log('User cancelled home screen install');
    }
    else {
      console.log('User added to home screen');
    }
  });
});
	</script>
	<script src="{{secure_asset('public/frontend/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{secure_asset('public/frontend/js/material.min.js')}}"></script>
<script src="{{ secure_asset('public/js/share.js') }}"></script>
	<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
	<script src="{{secure_asset('public/frontend/js/moment.min.js')}}"></script>
	<script src="{{secure_asset('public/frontend/js/es-us.js')}}"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
	<script src="{{secure_asset('public/frontend/js/nouislider.min.js')}}" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="{{secure_asset('public/frontend/js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
	<script src="{{secure_asset('public/frontend/js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
	<script src="{{secure_asset('public/frontend/js/bootstrap-tagsinput.js')}}"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="{{secure_asset('public/frontend/js/jasny-bootstrap.min.js')}}"></script>

	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="{{secure_asset('public/frontend/js/material-kit.js?v=1.2.1')}}" type="text/javascript"></script>

	<script>
$(document).on('click','#search', function(e) {
pace.start();
});

</script>

	<script type="text/javascript">

	@foreach ($postscalendar as $key1 => $p)
	$('.uno{{$key1}}').on('click', function(){
	$('html, body').animate({scrollTop: $("#div_id{{$key1}}").offset().top}, 'slow');
	});
	@endforeach
	$('.datetimepicker').datetimepicker({
		inline: true,
		sideBySide: true,
		keepOpen: true,
		format: 'YYYY-MM-DD',
		enabledDates: [

			@forelse ($postscalendar as $c)
			 moment("{{date('m/d/Y', strtotime($c->date_init))}}"),
			 @empty
			 moment("{{date('m/d/Y', strtotime(Carbon\Carbon::now()))}}")
			@endforelse

                    ],
		locale: 'es-us',
		 icons: {
				 time: "fa fa-clock-o",
				 date: "fa fa-calendar",
				 up: "fa fa-chevron-up",
				 down: "fa fa-chevron-down",
				 previous: 'fa fa-chevron-left',
				 next: 'fa fa-chevron-right',
				 today: 'fa fa-screenshot',
				 clear: 'fa fa-trash',
				 close: 'fa fa-remove'
		 },

 }).on('dp.change',function(e){
   $("#formevent").submit();
});
 $('.datetimepicker1').datetimepicker({
	 format: 'YYYY-MM-DD',
	 locale: 'es-us',
		icons: {
				time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-chevron-up",
				down: "fa fa-chevron-down",
				previous: 'fa fa-chevron-left',
				next: 'fa fa-chevron-right',
				today: 'fa fa-screenshot',
				clear: 'fa fa-trash',
				close: 'fa fa-remove'
		}
 });
 $('.datetimepicker2').datetimepicker({
	format: 'HH:mm',
	locale: 'es-us',
	 icons: {
			 time: "fa fa-clock-o",
			 date: "fa fa-calendar",
			 up: "fa fa-chevron-up",
			 down: "fa fa-chevron-down",
			 previous: 'fa fa-chevron-left',
			 next: 'fa fa-chevron-right',
			 today: 'fa fa-screenshot',
			 clear: 'fa fa-trash',
			 close: 'fa fa-remove'
	 }
 });

 $('.datetimepicker3').datetimepicker({
	format: 'YYYY-MM-DD',
	locale: 'es-us',
	 icons: {
			 time: "fa fa-clock-o",
			 date: "fa fa-calendar",
			 up: "fa fa-chevron-up",
			 down: "fa fa-chevron-down",
			 previous: 'fa fa-chevron-left',
			 next: 'fa fa-chevron-right',
			 today: 'fa fa-screenshot',
			 clear: 'fa fa-trash',
			 close: 'fa fa-remove'
	 }
 });
 $('.datetimepicker4').datetimepicker({
 format: 'HH:mm',
 locale: 'es-us',
	icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-chevron-up",
			down: "fa fa-chevron-down",
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-screenshot',
			clear: 'fa fa-trash',
			close: 'fa fa-remove'
	}
 });

	</script>
	<div style="display:none">
		{!! Notify::render() !!}
	</div>

</html>
