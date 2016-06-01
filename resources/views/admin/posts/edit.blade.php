@extends('admin.layouts.master')

@section('content')
	<h1>Edit Post</h1>

	@include('admin._alerts')

	<form method="post" action="{{route('admin.posts.update', ['posts' => $post->id])}}">
		{!! csrf_field() !!}
		{!! method_field('put') !!}
		<div>
			<label>Name</label>
			<input type="text" name="name" value="{{old('name', $post->name)}}">
		</div>
		<div>
			<label>Slug</label>
			<input type="text" name="slug" value="{{old('slug', $post->slug)}}">
		</div>
		<div>
			<label>Content</label>
			<textarea name="content" placeholder="Type...">{{old('content', $post->content)}}</textarea>
		</div>
		<input type="submit" name="submit" value="Save">
	</form>
@stop