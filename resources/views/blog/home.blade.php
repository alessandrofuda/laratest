
@extends('blog.layout')

@section('content')

	<div class="blog-header">
		<h1 class="blog-title" >Blog con Laravel 5.3 - eager loading testing ..</h1>
	</div>


	@if (count($posts) === 0)
		<h1>Non sono presenti post in database.</h1>
	@else

		@foreach($posts as $post)
			<div>
				<h2 class="blog-post-title">
					<a href="/post/{{ $post->id }}">{{ $post->title }}</a>
				</h2>
				<p class="blog-post-meta">Scritto da {{ $post->author->name }} della città di {{ $post->author->profile->city }}</p>
				<p>{{ $post->content }}</p>
			</div>
		@endforeach
		<p><br/><br/><br/><br/><br/>Da fare: commenti, popolamento database --> seeding</p>
	@endif
@stop