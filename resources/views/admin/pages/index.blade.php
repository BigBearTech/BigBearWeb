@extends('admin.layouts.master')

@section('content')
	<h1>Pages</h1>

	<ul>
		@foreach($pages as $page)
		<li>{{$page->id}}</li>
		<li>{{$page->name}}</li>
		<li>
			<form action="{{ route('admin.pages.destroy', ['pages' => $page->id]) }}" method="POST">
		        {{ csrf_field() }}
		        {{ method_field('DELETE') }}

		        <button type="submit" id="delete-post-{{ $page->id }}" class="btn btn-danger">
		            <i class="fa fa-btn fa-trash"></i>Delete
		        </button>
		    </form>
		</li>
		@endforeach
	</ul>
@stop