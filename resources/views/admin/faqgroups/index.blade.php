@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        FAQ Groups
        <small>Your FAQ Groups that hold the FAQ's</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">FAQ Groups</li>
      </ol>
    </section>
    <!-- /.End Page Header -->


    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
			    <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			            	<th>Title</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
			            </tr>
			        </thead>
				    <tfoot>
					    <tr>
					    	<th>Title</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
					    </tr>
					</tfoot>
			        <tbody>
			        	@foreach($faqgroups as $faqgroup)
				        <tr>
				            <td>{{$faqgroup->title}}</td>
				            @if(!is_null($faqgroup->user))
				            <td>{{$faqgroup->user->name}}</td>
				            @else
				            <td>No Author</td>
				            @endif
				            <td>{{$faqgroup->updated_at->diffForHumans()}}</td>
				            <td>
				            	<a id="edit-faqgroup-{{ $faqgroup->id }}" href="{{route('admin.faqgroups.edit', ['faqgroups' => $faqgroup->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            	<form style="display:inline;" action="{{ route('admin.faqgroups.destroy', ['faqgroups' => $faqgroup->id]) }}" method="POST">
							        {{ csrf_field() }}
							        {{ method_field('DELETE') }}

							        <button type="submit" id="delete-faqgroup-{{ $faqgroup->id }}" class="btn btn-link">
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