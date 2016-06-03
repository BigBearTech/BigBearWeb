@extends('admin.layouts.master')

@section('content')
	<h1>Create New Page</h1>

	@include('admin._alerts')

	<form method="post" action="{{route('admin.pages.store')}}">
		{!! csrf_field() !!}
		<div>
			<label>Name</label>
			<input type="text" name="name" value="{{old('name')}}">
		</div>
		<div>
			<label>Content</label>
			<textarea name="content" placeholder="Type...">{!! old('content') !!}</textarea>
		</div>
		<input type="submit" name="submit" value="Create">
	</form>
@stop