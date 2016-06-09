@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>Edit Testimonial</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.testimonials.index')}}"><i class="fa fa-commenting"></i> Testimonials</a></li>
        <li class="active">Edit Testimonial</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

	@include('admin._alerts')

	<section class="content">
		<form method="post" action="{{route('admin.testimonials.update', ['testimonials' => $testimonial->id])}}">
			{!! csrf_field() !!}
			{!! method_field('put') !!}
	    	<div class="row">
	        	<div class="col-md-8">
					<div class="form-group">
						<label>Display Name</label>
						<input type="text" name="display_name" value="{{old('display_name', $testimonial->display_name)}}" class="form-control input-lg">
					</div>
					<div class="form-group">
						<label>Fullname (private)</label>
						<input type="text" name="fullname" value="{{old('fullname', $testimonial->fullname)}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Email (private)</label>
						<input type="text" name="email" value="{{old('email', $testimonial->email)}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Location (public)</label>
						<input type="text" name="location" value="{{old('location', $testimonial->location)}}" class="form-control">
					</div>
					<div class="form-group">
						<label>URL (hidden)</label>
						<input type="text" name="url" value="{{old('url', $testimonial->url)}}" class="form-control">
					</div>

					<div class="form-group">
						<textarea id="bbeditor" name="content" placeholder="Type...">{!! old('content', $testimonial->content) !!}</textarea>
					</div>
				</div>
				<div class="col-md-4">
					<!-- Publish Box -->
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Publish</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Display URL Link</label>
								<select name="display_url" class="form-control">
									<option {{app('Form')->isActive($testimonial->display_url, 'false')}} value="false">No</option>
									<option {{app('Form')->isActive($testimonial->display_url, 'true')}} value="true">Yes</option>
								</select>
							</div>
							<div class="form-group">
								<label>Feature this testimonial?</label>
								<select name="featured" class="form-control">
									<option {{app('Form')->isActive($testimonial->featured, 'false')}} value="false">No</option>
									<option {{app('Form')->isActive($testimonial->featured, 'true')}} value="true">Yes</option>
								</select>
							</div>
							<div class="form-group">
								<label>Testimonial Status</label>
								<select name="status" class="form-control">
									<option {{app('Form')->isActive($testimonial->status, 'draft')}} value="draft">Draft</option>
									<option {{app('Form')->isActive($testimonial->status, 'pending')}} value="pending">Pending</option>
									<option {{app('Form')->isActive($testimonial->status, 'publish')}} value="publish">Publish</option>
									<option {{app('Form')->isActive($testimonial->status, 'trashed')}} value="trashed">Trashed</option>
								</select>
							</div>
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