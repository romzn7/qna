@extends('layout.layout')


@section('content')
	<h3> Ask A Question </h3>
	@if(Auth::check())

		{!! Form::open(array('route' => 'ask', 'method' => 'POST')) !!}

		<div class='form-group'>
			{!! Form::label('question', 'Question') !!}
			{!! Form::text('question', null, array('class' => 'form-control')) !!}
		</div>

		{!! Form::submit('Submit', array('class' => 'btn btn-success')) !!}

	@else
		You have to login First.
	@endif

	<h3> Unsolved Question </h3>
	@if(!$questions->count())
		No questions have been asked yet.
	@else
		<ul class="list-group">
			@foreach($questions as $question)

					<a href="{{ route('question', ['id' => $question->id]) }}" class="list-group-item">{{ $question->question }} by {{ $question->user_id }}</a>

			@endforeach
		</ul>
		@if($questions->lastPage() > 1)
			<nav>
				<ul class="pager">
					@if($questions->currentPage() !== 1)
						<li><a href="{{ $questions->previousPageUrl() }}">Previous</a></li>
					@endif
					@if($questions->currentPage() !== $questions->lastPage())
						<li><a href="{{ $questions->nextPageUrl() }}">Next</a></li>
					@endif
				</ul>
			</nav>
		@endif
	@endif

@stop