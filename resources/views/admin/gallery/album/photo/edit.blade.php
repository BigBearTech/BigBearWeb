@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>Edit Attachment</h1>
      <ol class="breadcrumb">
          <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{route('admin.gallery.index')}}"><i style="font-size: inherit;" class="fa material-icons">photo_library</i> Photo Galleries</a></li>
          <li><a href="{{route('admin.gallery.album.index', ['gallery' => $gallery->id])}}">Albums</a></li>
          <li><a href="{{route('admin.gallery.album.photo.index', ['gallery' => $gallery->id, 'album' => $album->id])}}">{{$album->title}}</a></li>
          <li class="active">Edit Photo</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

	@include('admin._alerts')

	<section class="content">
		<form method="post" action="{{route('admin.gallery.album.photo.update', ['gallery' => $gallery->id, 'album' => $album->id, 'photo' => $photo->id])}}">
			{!! csrf_field() !!}
			{!! method_field('put') !!}
	    	<div class="row">
	        	<div class="col-md-8">
					<div class="form-group">
						<input type="text" placeholder="Enter title here" name="title" value="{{old('title', $photo->title)}}" class="form-control input-lg">
					</div>

					<div class="form-group">
						<img src="{{app('Media')->getImage($photo->attachment->path)}}" class="img-responsive">
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea name="description" class="form-control">{{old('description', $photo->description)}}</textarea>
					</div>
				</div>
				<div class="col-md-4">
					<!-- Publish Box -->
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Publish</h3>
						</div>
						<div class="box-body">
							<p>Uploaded: <b>{{$photo->created_at->diffForHumans()}}</b></p>
							<p style="overflow-wrap: break-word;">File name: <b>{{$photo->attachment->file_name}}</b></p>
							<p style="overflow-wrap: break-word;">File type: <b>{{$photo->attachment->mime_type}}</b></p>
							<p style="overflow-wrap: break-word;">File size: <b>{{app('Media')->human_filesize($photo->attachment->size)}}</b></p>
							<p style="overflow-wrap: break-word;">Dimensions: <b>960x960</b></p>
						</div>
						<div class="box-footer">
							<button value="save" class="btn btn-danger" name="action">Update</button>
						</div>
					</div>
					<!-- /.Publish Box -->
				</div>
			</div>
		</form>
	</section>
@stop
