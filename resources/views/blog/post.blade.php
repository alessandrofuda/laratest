
@extends('blog.layout')

@section('content')

	
	<div class="row">
		<div class="col-sm-8 blog-main">
			<div class="blog-post">
				<h1 class="blog-post-title">{{ $post->title }}</h1>
				<h3 class="blog-post-meta">Scritto da {{ $post->author->name }}</h3>
				<p> {{ $post->content }} </p>
			</div>
		</div>
	</div>
@stop