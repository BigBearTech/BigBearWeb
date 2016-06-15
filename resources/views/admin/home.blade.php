@extends('admin.layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  	<h1>
    	Dashboard
    	<small>Version 0.0.1</small>
  	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Info Boxes -->
  	<div class="row">
        <!-- Start Members -->
  		<div class="col-md-3 col-sm-6 col-xs-12">
          	<div class="info-box">
            	<span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            	<div class="info-box-content">
              		<span class="info-box-text">Members</span>
              		<span class="info-box-number">{{$countUsers}}</span>
            	</div>
            	<!-- /.info-box-content -->
          	</div>
          	<!-- /.info-box -->
        </div>
        <!-- /.End Members -->
        <!-- Start Posts -->
  		<div class="col-md-3 col-sm-6 col-xs-12">
          	<div class="info-box">
            	<span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            	<div class="info-box-content">
              		<span class="info-box-text">Posts</span>
              		<span class="info-box-number">{{$countPosts}}</span>
            	</div>
            	<!-- /.info-box-content -->
          	</div>
          	<!-- /.info-box -->
        </div>
        <!-- /.End Posts -->
        <!-- Start Pages -->
  		<div class="col-md-3 col-sm-6 col-xs-12">
          	<div class="info-box">
            	<span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            	<div class="info-box-content">
              		<span class="info-box-text">Pages</span>
              		<span class="info-box-number">{{$countPages}}</span>
            	</div>
            	<!-- /.info-box-content -->
          	</div>
          	<!-- /.info-box -->
        </div>
        <!-- /.End Pages -->
  	</div>
  	<!-- /.End Info Boxes -->
</section>
<!-- /.content -->
@stop
