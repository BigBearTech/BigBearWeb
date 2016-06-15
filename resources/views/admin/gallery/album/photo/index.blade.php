@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        Media Manager
        <small></small>
        <a class="btn btn-primary" href="{{route('admin.gallery.album.photo.create', ['gallery' => $gallery->id, 'album' => $album->id])}}">Add New</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.gallery.index')}}"><i style="font-size: inherit;" class="fa material-icons">photo_library</i> Photo Galleries</a></li>
        <li><a href="{{route('admin.gallery.album.index', ['gallery' => $gallery->id])}}">{{$gallery->title}}</a></li>
		<li class="active">{{$album->title}}</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
			    <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			            	<th>File</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
			            </tr>
			        </thead>
				    <tfoot>
					    <tr>
					    	<th>File</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
					    </tr>
					</tfoot>
			        <tbody>
			        	@foreach($photos as $photo)
				        <tr>
				            <td>
				            	<div>
				            		<img src="{{app('Media')->getImage($photo->attachment->path, ['w' => 100, 'h' => 100])}}" class="img-reponsive">
				            	</div>
				            	{{$photo->title}}
				            </td>
				            <td>{{$photo->user->name}}</td>
				            <td>{{$photo->updated_at->diffForHumans()}}</td>
				            <td>
				            	<a id="edit-photo-{{ $photo->id }}" href="{{route('admin.gallery.album.photo.edit', ['gallery' => $gallery->id, 'album' => $album->id, 'photo' => $photo->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            </td>
				        </tr>
				        @endforeach
			        </tbody>
				</table>
			</div>
		</div>
    </section>
@stop
