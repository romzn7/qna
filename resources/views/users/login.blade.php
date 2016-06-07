@extends('layout.layout')

@section('content')
	
	<h2>Log In</h2>
	{!! Form::open(array('route' => 'login', 'method' => 'POST')) !!}

		<div class='form-group'>
			{!! Form::label('username', 'Username') !!}
			{!! Form::text('username', null, array('class' => 'form-control')) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', array('class' => 'form-control')) !!}
		</div>

		{!! Form::submit('Log In', array('class' => 'btn btn-success')) !!}


@stop

