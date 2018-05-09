@extends('layouts.appfront') @section('contentapp')

<div class="row">
  <div class="col-md-offset-2 col-sm-8" style="margin-top:0px;">
    <center>
      <form class="" action="{{route('front.index')}}" method="get" id="formevent">
        <div class="form-group dp1" style="margin-top:-50px;">
          <h3>Busca tu evento</h3>
          <input type="text" id="datetimepicker" name="search" class="form-control datetimepicker" required style="display:none"/>
            @if ($search == TRUE)
            <a href="{{url('/')}}" class="btn btn-success">Regresar</a>
            @endif
        </div>
      </form>
    </center>
    <br><br><br>

  </div>
</div>

<style media="screen">
#fixedbutton {
  position: fixed;
      bottom: 0px;
      right: 0px;
        z-index: 3000;
}
</style>
<script type="text/javascript">
var clicks = 0;
 function clickME() {
     clicks += 1;
     $('html, body').animate({scrollTop: $("#div_id" + clicks).offset().top}, 'slow');

}
function clickME1() {
    clicks -= 1;
    if (clicks <= 0) {
      // This will occur once counter reaches zero, or negative numbers
      clicks = 0;
  }
    $('html, body').animate({scrollTop: $("#div_id" + clicks).offset().top}, 'slow');

}
</script>
<div class="btn btn-success btn-round" onclick="clickME()" id="fixedbutton" style="margin-right:10px;">
<div>

</div>
  <i class="fas fa-arrow-down"></i>
</div>

<div class="btn btn-success btn-round" onclick="clickME1()" id="fixedbutton" style="margin-right:80px;">

  <div></div>
  <i class="fas fa-arrow-up"></i>

</div>

<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<!-- sample html for this button-->

<!-- stylesheet for this button -->

<div class="row display-flex">

  @forelse ($posts as $key => $p)
  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 " >

    <div class="card card-blog @if ($key == 0)
      activeasd
    @endif" id="div_id{{$key}}"
    @if (date('d/m/y', strtotime($p->date_init)) == date('d/m/y', strtotime(Carbon\Carbon::now())))
      style="box-shadow: 0px 4px 9px -1px rgba(159,61,181,1);"
    @endif
    >
      <div class="card-image">
          @if ($p->image)
            <a href="#" data-toggle="modal" data-target="#myModal{{$p->id}}">
              <img class="img img-responsive" style="height:330px;" src="{{$p->image}}">
            </a>
            @else
              <img class="img" style="height:330px;" src="{{asset('frontend/img/image_placeholder.jpg')}}">
          @endif
      </div>

      <div class="card-content">
        <h6 class="category" style="color:#E91E63;">
          @if ($p->category != null)
          {{$p->category->name}}
          @endif
      </h6>
        <p class="card-description">
          {{ str_limit(strip_tags($p->description), 255) }}
          @if (strlen(strip_tags($p->description)) > 255)
            <br>
               <a href="#" data-toggle="modal" data-target="#myModal{{$p->id}}">Ver mas...</a>
            @endif
            <br>
            <br>
          <b><a href="{{$p->webfacebook}}" target="_blank" style="color:#999999;">
          Web/Facebook
          </a></b>
        </p>
        @if ($p->sticky == 1) @else
        <div class="footer">
          <div class="author">
            <br>
            <b class=""><i class="material-icons">place</i> {{$p->place}}</b>
<br>
<b class=""><i class="material-icons">date_range</i> {{date('d/m/y', strtotime($p->date_init))}}
      <br>
    <i class="material-icons">schedule</i> {{$p->hour}}</b>
          </div>

        </div>
        @endif
        <br>
        <a href="{{ url('/share/'.$p->id) }}"
            target="_blank" style="color:#999999;">
            <i class="fab fa-facebook"></i> Compartir en Facebook
        </a>
        <br>
        <a href="https://api.whatsapp.com/send?text={{ url('/shares/'.$p->id) }}" data-action="share/whatsapp/share" style="color:#999999;" ><i class="fab fa-whatsapp"></i>  Compartir en WhatsApp</a>
        <p>
        </div>
      </div>
    </div>

  @empty

  <div class="col-sm-12">
    <div class="card">
      <center>
        <div class="card-content content-primary">
          <h4 class="card-title">
          <a href="">No se han encontrado resultados.</a>
        </h4>
          <p class="card-description">
          </p>
        </div>
    </div>
    </center>
  </div>
  @endforelse
</div>


@endsection

@section('modals')
  @foreach ($posts as $c)
    <div class="modal fade" id="myModal{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">clear</i>
            </button>
            <h4 class="modal-title">{{$c->title}}</h4>
          </div>
          <div class="modal-body">
            <center>
              <img class="img-responsive" src="
              {{$c->image}}
              " alt="">
              </center>

              <p>{!! $c->description !!}</p>
              <br>

          </div>
          <div class="modal-footer">
            <div  class="pull-left">
              <a href="{{ url('/share/'.$c->id) }}"
                  target="_blank" style="color:#999999;">
                  <i class="fab fa-facebook"></i> Compartir en Facebook
              </a>
              <br>
              <a href="https://api.whatsapp.com/send?text={{ url('/shares/'.$c->id) }}" data-action="share/whatsapp/share" style="color:#999999;" target="_blank"><i class="fab fa-whatsapp"></i>  Compartir en WhatsApp</a>
            </div>

            <button type="button" class="btn btn-success btn-simple" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection
