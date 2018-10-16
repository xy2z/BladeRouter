@extends('layout')

@section('content')
	<h1>Welcome to {{ Config::get('app.name') }}!</h1>
	Feel free to remove all views and start creating your project.<br />
	<br />
	Enjoy!
@endsection
