@extends('admin.layouts.master')

@section('content')
	<h1>Posts</h1>

	<ul>
		@foreach($posts as $post)
		<li>{{$post->id}}</li>
		<li>{{$post->name}}</li>
		<li>
			<form action="{{ route('admin.posts.destroy', ['posts' => $post->id]) }}" method="POST">
		        {{ csrf_field() }}
		        {{ method_field('DELETE') }}

		        <button type="submit" id="delete-post-{{ $post->id }}" class="btn btn-danger">
		            <i class="fa fa-btn fa-trash"></i>Delete
		        </button>
		    </form>
		</li>
		@endforeach
	</ul>
@stop