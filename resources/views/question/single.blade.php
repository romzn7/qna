@extends('layout.layout')


@section('content')
    <ul class="list-group">

            <li class="list-group-item">{{ $question->question }} by {{ $question->user_id }}</li>

    </ul>
@stop