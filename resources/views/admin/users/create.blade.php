@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>Add New User</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.users.index')}}"><i class="fa fa-users"></i> Users</a></li>
        <li class="active">Add New User</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

	@include('admin._alerts')

	<section class="content">
		<form method="post" action="{{route('admin.users.store')}}">
			{!! csrf_field() !!}
	    	<div class="row">
	        	<div class="col-md-12">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" value="{{old('name')}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" value="{{old('email')}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label>Role</label>
						<select name="role" class="form-control">
							<option value="user">User</option>
							<option value="admin">Admin</option>
						</select>
					</div>
					<input type="submit" value="Add New User" class="btn btn-danger">
				</div>
			</div>
		</form>
	</section>
@stop