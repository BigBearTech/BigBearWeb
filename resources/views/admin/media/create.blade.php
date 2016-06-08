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
        <li class="active">Upload New Media</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
        		<form action="{{route('admin.media.store')}}" class="dropzone">
        			{!! csrf_field() !!}
  					<div class="fallback">
    					<input name="file" type="file" multiple />
  					</div>
				</form>
			</div>
		</div>
    </section>
@stop