Hola <i>{{ $demo->receiver }}</i>,
<p>Ha llegado un evento nuevo.</p>

<p><u>Detalles del evento:</u></p>

<div>
<p><b>titulo:</b>&nbsp;{{ $demo->demo_one }}</p>
<p><b>email:</b>&nbsp;{{ $demo->demo_two }}</p>
</div>
Gracias,
<br/>
<i>{{ $demo->sender }}</i>
