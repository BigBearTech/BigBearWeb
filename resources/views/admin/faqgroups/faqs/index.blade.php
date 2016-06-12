@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        FAQ's
        <small>Your FAQ's that are in groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.faqgroups.index')}}"><i class="fa fa-life-ring"></i> FAQ Groups</a></li>
        <li class="active">FAQ's</li>
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
			        	@foreach($faqs as $faq)
				        <tr>
				            <td>{{$faq->title}}</td>
				            @if(!is_null($faq->user))
				            <td>{{$faq->user->name}}</td>
				            @else
				            <td>No Author</td>
				            @endif
				            <td>{{$faq->updated_at->diffForHumans()}}</td>
				            <td>
				            	<a id="edit-faq-{{ $faq->id }}" href="{{route('admin.faqgroups.faqs.edit', ['faqgroups' => $faqGroup->id, 'faqs' => $faq->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            	<form style="display:inline;" action="{{ route('admin.faqgroups.destroy', ['faqgroups' => $faqGroup->id, 'faqs' => $faq->id]) }}" method="POST">
							        {{ csrf_field() }}
							        {{ method_field('DELETE') }}

							        <button type="submit" id="delete-faq-{{ $faq->id }}" class="btn btn-link">
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