@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        Testimonials
        <small>Your testimonials from your clients</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Testimonials</li>
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
			            	<th>Status</th>
			            	<th>Date</th>
			            	<th>Action</th>
			            </tr>
			        </thead>
				    <tfoot>
					    <tr>
					    	<th>Name</th>
					    	<th>Email</th>
			            	<th>Status</th>
			            	<th>Date</th>
			            	<th>Action</th>
					    </tr>
					</tfoot>
			        <tbody>
			        	@foreach($testimonials as $testimonial)
				        <tr>
				            <td>{{$testimonial->fullname}}</td>
				            <td>{{$testimonial->email}}</td>
				            <td>{{$testimonial->status}}</td>
				            <td>{{$testimonial->updated_at->diffForHumans()}}</td>
				            <td>
				            	<a id="edit-testimonial-{{ $testimonial->id }}" href="{{route('admin.testimonials.edit', ['posts' => $testimonial->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            	<form style="display:inline;" action="{{ route('admin.testimonials.destroy', ['posts' => $testimonial->id]) }}" method="POST">
							        {{ csrf_field() }}
							        {{ method_field('DELETE') }}

							        <button type="submit" id="delete-testimonial-{{ $testimonial->id }}" class="btn btn-link">
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