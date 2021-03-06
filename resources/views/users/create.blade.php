@extends('layout.layout')

@section('content')
	<h2> Register </h2>
	

	{!! Form::open(array('route' => 'register', 'method' => 'POST')) !!}

	<div class='form-group'>
		{!! Form::label('username', 'Username') !!}
		{!! Form::text('username', null, ['class' => 'form-control']) !!}
	</div>

	<div class='form-group'>
		{!! Form::label('password', 'Password') !!}
		{!! Form::password('password', array('class' => 'form-control')) !!}
	</div>

	<div class='form-group'>
		{!! Form::label('password_confirmation', 'Confirm Password') !!}
		{!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
	</div>

	<div class='form-group'>
		{!! Form::submit('Sign Up', array('class' => 'btn btn-success')) !!}
	</div>	

	{!! Form::close() !!}

@stop