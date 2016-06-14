@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        Photo Galleries
        <small>Your Photo Galleries</small>
		<a class="btn btn-primary" href="{{route('admin.gallery.create')}}">Add New</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Photo Galleries</li>
      </ol>
    </section>
    <!-- /.End Page Header -->


    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
			    <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			            	<th>Title</th>
			            	<th>Description</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
			            </tr>
			        </thead>
				    <tfoot>
					    <tr>
					    	<th>Title</th>
					    	<th>Description</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
					    </tr>
					</tfoot>
			        <tbody>
			        	@foreach($galleries as $gallery)
				        <tr>
				            <td>{{$gallery->title}}</td>
				            <td>{{$gallery->description}}</td>
				            <td>{{$gallery->user->name}}</td>
				            <td>{{$gallery->updated_at->diffForHumans()}}</td>
				            <td>
				            	<a id="view-gallery-{{ $gallery->id }}" href="{{route('admin.gallery.album.index', ['gallery' => $gallery->id])}}" class="btn btn-link">
							        View
							    </a>
				            	<a id="edit-gallery-{{ $gallery->id }}" href="{{route('admin.gallery.edit', ['gallery' => $gallery->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            	<form style="display:inline;" action="{{ route('admin.gallery.destroy', ['gallery' => $gallery->id]) }}" method="POST">
							        {{ csrf_field() }}
							        {{ method_field('DELETE') }}

							        <button type="submit" id="delete-gallery-{{ $gallery->id }}" class="btn btn-link">
							            Delete
							        </button>
							    </form>
				            </td>
				        </tr>
				        @endforeach
			        </tbody>
				</table>
			</div>
		</div>
    </section>
@stop
