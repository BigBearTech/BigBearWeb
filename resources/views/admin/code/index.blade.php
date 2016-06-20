@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        Codes
        <small>The 3rd party tracking codes</small>
		<a class="btn btn-primary" href="{{route('admin.code.create')}}">Add New</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Codes</li>
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
			            	<th>Code</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
			            </tr>
			        </thead>
				    <tfoot>
					    <tr>
					    	<th>Name</th>
					    	<th>Code</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
					    </tr>
					</tfoot>
			        <tbody>
			        	@foreach($codes as $code)
				        <tr>
				            <td>{{$code->name}}</td>
				            <td>{{$code->content}}</td>
				            <td>{{$code->user->name}}</td>
				            <td>{{$code->updated_at->diffForHumans()}}</td>
				            <td>
				            	<a id="view-gallery-{{ $code->id }}" href="{{route('admin.code.show', ['code' => $code->id])}}" class="btn btn-link">
							        View
							    </a>
				            	<a id="edit-gallery-{{ $code->id }}" href="{{route('admin.code.edit', ['code' => $code->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            	<form style="display:inline;" action="{{ route('admin.code.destroy', ['code' => $code->id]) }}" method="POST">
							        {{ csrf_field() }}
							        {{ method_field('DELETE') }}

							        <button type="submit" id="delete-code-{{ $code->id }}" class="btn btn-link">
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
