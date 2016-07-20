@extends('layout.layout')

@section('content')
        {!! Form::open(array('route' => 'edited', 'method' => 'POST')) !!}

        <div class='form-group'>
            {!! Form::hidden('id', $question->id, array('class' => 'form-control')) !!}
        </div>

        <div class='form-group'>
            {!! Form::label('question', 'Question') !!}
            {!! Form::text('question', $question->question, array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Edit', array('class' => 'btn btn-default')) !!}
@stop