@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>Add New Post</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.posts.index')}}"><i class="fa fa-thumb-tack"></i> Posts</a></li>
        <li class="active">Add New Post</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

	@include('admin._alerts')

	<section class="content">
		<form method="post" action="{{route('admin.posts.store')}}">
			{!! csrf_field() !!}
	    	<div class="row">
	        	<div class="col-md-8">
					<div class="form-group">
						<input type="text" placeholder="Enter title here" name="name" value="{{old('name')}}" class="form-control input-lg">
					</div>
					<div class="form-group">
						<textarea id="bbeditor" name="content" placeholder="Type...">{!! old('content') !!}</textarea>
					</div>

					<!-- SEO Box -->
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">SEO</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Title</label>
								<input type="text" name="seo_title" class="form-control" value="{{old('seo_title')}}">
							</div>
							<div class="form-group">
								<label>Keywords</label>
								<input type="text" name="seo_keywords" class="form-control" value="{{old('seo_keywords')}}">
							</div>
							<div class="form-group">
								<label>Description</label>
								<input type="text" name="seo_description" class="form-control" value="{{old('seo_description')}}">
							</div>
						</div>
					</div>
					<!-- /.SEO Box -->
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
							<button name="publish" class="btn btn-danger" name="action">Publish</button>
						</div>
					</div>
					<!-- /.Publish Box -->
				</div>
			</div>
		</form>
	</section>
@stop