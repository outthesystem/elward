<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/frontend/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" href="{{asset('public/frontend/img/favicon.png')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>El Ward Oficial - {{$post->title}}</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/frontend/css/material-kit.css?v=1.2.1')}}" rel="stylesheet"/>
</head>

<body class="blog-post" style="background-color:white;font-family: 'Open Sans', sans-serif;">

  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{$post->image}}');">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-8 col-md-offset-2 text-center">
  					<h1 class="title" style="font-family: 'Open Sans', sans-serif;">{{$post->title}}</h1>
  					<h4 style="font-family: 'Open Sans', sans-serif;">{{$post->content}}</h4>
            <br />
					<a href="{{url('/')}}" class="btn btn-rose btn-round btn-lg">
						<i class="material-icons">arrow_left</i> Volver
					</a>
  				</div>
  			</div>
  		</div>
  	</div>

<div class="main" >
		<div class="container" >
      <div class="section">

        {!! $post->description !!}

      </div>
      <div class="section section-blog-info">
                <div class="row">
					<div class="col-md-8 col-md-offset-2">

						<div class="row">
							<div class="col-md-6">
								<div class="blog-tags">
									Categoria:
									<span class="label label-primary">{{$post->category->name}}</span>
								</div>
							</div>
							<div class="col-md-6">
								<a href="{{ url('/share/'.$post->->id) }}" class="btn btn-facebook btn-round pull-right">
									<i class="fa fa-facebook-square"></i>
								</a>
								<a href="https://api.whatsapp.com/send?text={{ url('/shares/'.$post->->id) }}" class="btn btn-twitter btn-round pull-right">
									<i class="fab fa-whatsapp"></i>
								</a>
							</div>
						</div>

						<hr />


					</div>
    			</div>
            </div>

		</div>
	</div>

  <div class="section">
		<div class="container">
			<div class="row">


				@if ($posts->count() == 0)

						@else
							<div class="col-md-12">
								<h2 class="title text-center">notas</h2>
								<br />
								<div class="row">

									@foreach ($posts as $p)
										<div class="col-md-4">
											<div class="card card-blog">
												<div class="card-image">
													<a href="#pablo">
														@if ($p->image)
															<img class="img" style="height:330px;" src="{{$p->image}}">
															@else
																<img class="img" style="height:330px;" src="{{asset('public/frontend/img/image_placeholder.jpg')}}">
														@endif
													</a>
												</div>

												<div class="card-content">
													<h6 class="category text-info">{{$p->category->name}}</h6>
													<p class="card-description">
													{{$p->content}}
													</p>
													<p>
														<a href="{{url('post/'.$p->id)}}">Ver mas...</a>
													</p>
												</div>
											</div>
										</div>
									@endforeach
								</div>

							</div>
				@endif

			</div>
		</div>
	</div>

	<footer class="footer">
			<div class="container">


				<ul class="pull-center">

					<a href="https://www.facebook.com/El-Ward-1912841569026994" target="_blank" class="btn btn-just-icon btn-facebook btn-simple"
					style="margin-bottom:-15px;">
						<i class="fa fa-facebook-square"></i>
					</a>
					<br>

						<a class="footer-brand" href="#">	cuenta.elwardoficial@gmail.com</a>


					<ul class="social-buttons pull-right">
						<li>

						</li>
					</ul>
				</ul>


			</div>
		</footer>
</body>
	<!--   Core JS Files   -->
	<script src="{{asset('public/frontend/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('public/frontend/js/material.min.js')}}"></script>

	<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
	<script src="{{asset('public/frontend/js/moment.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/es-us.js')}}"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
	<script src="{{asset('public/frontend/js/nouislider.min.js')}}" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="{{asset('public/frontend/js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
	<script src="{{asset('public/frontend/js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
	<script src="{{asset('public/frontend/js/bootstrap-tagsinput.js')}}"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="{{asset('public/frontend/js/jasny-bootstrap.min.js')}}"></script>

	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="{{asset('public/frontend/js/material-kit.js?v=1.2.1')}}" type="text/javascript"></script>

	{!! Notify::render() !!}

</html>
