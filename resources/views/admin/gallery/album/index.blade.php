@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        Albums
        <small>Your Albums</small>
        <a href="{{route('admin.gallery.album.create', ['gallery' => $gallery->id])}}" class="btn btn-primary">Add New</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.gallery.index')}}"><i style="font-size: inherit;" class="fa material-icons">photo_library</i> Photo Galleries</a></li>
        <li class="active">Albums</li>
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
			        	@foreach($albums as $album)
				        <tr>
				            <td>{{$album->title}}</td>
				            <td>{{$album->description}}</td>
				            <td>{{$album->user->name}}</td>
				            <td>{{$album->updated_at->diffForHumans()}}</td>
				            <td>
				            	<a id="view-gallery-{{ $album->id }}" href="{{route('admin.gallery.album.index', ['gallery' => $gallery->id])}}" class="btn btn-link">
							        View
							    </a>
				            	<a id="edit-gallery-{{ $album->id }}" href="{{route('admin.gallery.edit', ['gallery' => $album->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            	<form style="display:inline;" action="{{ route('admin.gallery.destroy', ['gallery' => $album->id]) }}" method="POST">
							        {{ csrf_field() }}
							        {{ method_field('DELETE') }}

							        <button type="submit" id="delete-gallery-{{ $album->id }}" class="btn btn-link">
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