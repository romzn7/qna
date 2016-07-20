@extends('layout.layout')


@section('content')
    <ul class="list-group">
        <ul class="list-group">

            @foreach($questions as $question)
                <li class="list-group-item">
                @if(!$question->count())
                     No questions yet.
                @else
                {{ $question->question }} </li>
                @endif
              @endforeach
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
        </ul>




    </ul>
@stop