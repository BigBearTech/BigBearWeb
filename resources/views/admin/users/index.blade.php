@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        Users
        <small>Your users for the site</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Users</li>
      </ol>
    </section>
    <!-- /.End Page Header -->


    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
			    <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			            	<th>Name</th>
			            	<th>Email</th>
			            	<th>Role</th>
			            	<th>Posts</th>
			            	<th>Action</th>
			            </tr>
			        </thead>
				    <tfoot>
					    <tr>
					    	<th>Name</th>
			            	<th>Email</th>
			            	<th>Role</th>
			            	<th>Posts</th>
			            	<th>Action</th>
					    </tr>
					</tfoot>
			        <tbody>
			        	@foreach($users as $user)
				        <tr>
				            <td>{{$user->name}}</td>
				            <td>{{$user->email}}</td>
				            <td>{{$user->role}}</td>
				            <td>{{$user->posts->count()}}</td>
				            <td>
				            	<a id="edit-user-{{ $user->id }}" href="{{route('admin.users.edit', ['users' => $user->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            	<form style="display:inline;" action="{{ route('admin.users.destroy', ['users' => $user->id]) }}" method="POST">
							        {{ csrf_field() }}
							        {{ method_field('DELETE') }}

							        <button type="submit" id="delete-user-{{ $user->id }}" class="btn btn-link">
							            Delete
							        </button>
							    </form>
				            </td>
				        </tr>
				        @endforeach
			        </tbody>
				</table>
			</div>
		</div>
    </section>
@stop