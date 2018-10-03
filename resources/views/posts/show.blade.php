@extends('layouts.box')

@section('content')
	
	<p class="float-right font-weight-light">Posted on {{ $post->created_at->format('d-M-Y') }}, by {{ $post->user->name }}</p>
	
	@card()
		@slot('card_title')
			<h3>{{ $post->title }}</h3>
		@endslot
		@slot('card_body')
        	{!! $post->content !!}
        @endslot
    @endcard
@endsection