<meta property="og:url"                content="{{ url('/shares/'.$post->id) }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{$post->title}}" />
<meta property="og:description"        content="{{ strip_tags($post->description) }}" />
<meta property="og:image"              content="{{$post->image}}" />
<meta property="fb:app_id"              content="1925782371065760" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="400" />

<script type="text/javascript">
  window.location = "https://www.facebook.com/sharer/sharer.php?u={{ url('/shares/'.$post->id) }}";
</script>
