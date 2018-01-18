@extends('user/app')

@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title','Demo Blog')
@section('sub-heading','My Blog')
@section('head')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		
		.fa-thumbs-up:hover{
			color: red;
		}
	</style>
@endsection
@section('main-content')
	<!-- Main Content -->
	<div class="container">
	    <div class="row" id="app">
	        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	        	<posts 
	        	v-for='value in blog'
	        	:title=value.title
	        	:subtitle=value.subtitle
	        	:created_at=value.created_at
	        	:key=value.index
	        	:slug=value.slug
	        	:post-id=value.id
	        	login = "{{ Auth::id()}}"
	        	:likes = value.likes.length
	        	></posts>
	            <hr>
	            <!-- Pager -->
	            <ul class="pager">
	                <li class="next">
	                	{{ $posts->links() }}
	                </li>
	            </ul>
	        </div>
	    </div>
	</div>

	<hr>
@endsection
@section('footer')
	<script src="{{asset('js/app.js')}}"></script>
@endsection
