@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>Edit FAQ</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.faqgroups.index')}}"><i class="fa fa-thumb-tack"></i> FAQ Groups</a></li>
        <li class="active">Edit FAQ</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

	@include('admin._alerts')

	<section class="content">
		<form method="post" action="{{route('admin.faqgroups.faqs.update', ['faqgroups' => $faqGroup->id, 'faqs' => $faq->id])}}">
			{!! csrf_field() !!}
			{!! method_field('put') !!}
	    	<div class="row">
	        	<div class="col-md-8">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" value="{{old('title', $faq->title)}}" class="form-control input-lg">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" class="form-control">{!! old('description', $faq->description) !!}</textarea>
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