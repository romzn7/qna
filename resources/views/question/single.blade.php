@extends('layout.layout')


@section('content')
    <ul class="list-group">
            <li class="list-group-item">{{ $question->question }}
                <h3> Answer this Question</h3>

                @if(Auth::check())

                {!! Form::open(array('route' => 'answer', 'method' => 'POST')) !!}

                {!! Form::hidden('question_id', $question->id) !!}

                {!! Form::label('answer', 'Answer') !!}
                {!! Form::text('answer', null, array('class' => 'form-control', 'placeholder' => 'Write your answer here')) !!}

                {!! Form::submit('Answer', array('class' => 'btn btn-default')) !!}

                 @else
                    <p> You need to login First. Click here to <a href="{{ route('login') }}">login</a> </p>

                @endif
                @foreach ($answer as $ans)
                <li class="list-group-item"> {{ $ans->answer }}</li>
                @endforeach
    </li></ul>
@stop