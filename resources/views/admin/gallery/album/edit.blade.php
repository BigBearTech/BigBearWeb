@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>Edit Album</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.gallery.index')}}"><i style="font-size: inherit;" class="fa material-icons">photo_library</i> Photo Galleries</a></li>
        <li><a href="{{route('admin.gallery.album.index', ['gallery' => $gallery->id])}}">{{$gallery->title}}</a></li>
        <li class="active">Edit Album</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

	@include('admin._alerts')

	<section class="content">
		<form method="post" action="{{route('admin.gallery.album.update', ['gallery' => $gallery->id, 'album' => $album->id])}}">
			{!! csrf_field() !!}
			{!! method_field('put') !!}
	    	<div class="row">
	        	<div class="col-md-8">
					<div class="form-group">
						<input type="text" placeholder="Enter title here" name="title" value="{{old('title', $album->title)}}" class="form-control input-lg">
					</div>
					<div class="form-group">
						<textarea name="description" placeholder="Type..." class="form-control">{!! old('description', $album->description) !!}</textarea>
					</div>
				</div>
				<div class="col-md-4">
					<!-- Publish Box -->
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Publish</h3>
						</div>
						<div class="box-body">

						</div>
						<div class="box-footer">
							<button name="publish" class="btn btn-danger" name="action">Save</button>
						</div>
					</div>
					<!-- /.Publish Box -->
				</div>
			</div>
		</form>
	</section>
@stop