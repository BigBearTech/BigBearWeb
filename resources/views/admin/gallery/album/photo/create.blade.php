@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        Upload New Media
        <small></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{route('admin.gallery.index')}}"><i style="font-size: inherit;" class="fa material-icons">photo_library</i> Photo Galleries</a></li>
          <li><a href="{{route('admin.gallery.album.index', ['gallery' => $gallery->id])}}">Albums</a></li>
          <li><a href="{{route('admin.gallery.album.photo.index', ['gallery' => $gallery->id, 'album' => $album->id])}}">{{$album->title}}</a></li>
          <li class="active">Photo Upload</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
        		<form action="{{route('admin.gallery.album.photo.store', ['gallery' => $gallery->id, 'album' => $album->id])}}" method="post" enctype="multipart/form-data" class="dropzone">
        			{!! csrf_field() !!}
  					<div class="fallback">
    					<input name="file" type="file" />
  					</div>
				</form>
			</div>
		</div>
    </section>
@stop
