@extends('user/app')

@section('bg-img',asset('uploads/'.$post->image))

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('user/css/prism.css')}}">
@endsection

@section('title',$post->title)
@section('sub-heading',$post->subtitle)

@section('main-content')
<!-- Post Content -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
            <small>Created at {{ $post->created_at }}</small>
            @foreach ($post->categories as $cate)
                <small class="pull-right" style="margin-right: 20px;">
                    <a href="{{ route('category', $cate->slug) }}">{{$cate->name}}</a>
                </small>

            @endforeach
                    {!! htmlspecialchars_decode($post->body) !!}
            <!-- TAG -->
            <h3>TAG CLOUDS</h3> 
            @foreach ($post->tags as $tag)
                <a href="{{ route('tag', $tag->slug) }}">
                    <small style="margin-right: 20px; border-radius:5px;border: 1px solid gray;padding: 5px;">
                            {{$tag->name}}
                    </small>
                </a>
            @endforeach
            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10"></div>

            </div>
        </div>
    </div>
</article>
@endsection

@section('footer')
    <script src="{{asset('user/js/prism.js')}}"></script>
@endsection