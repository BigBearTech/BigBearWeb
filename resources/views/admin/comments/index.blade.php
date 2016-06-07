@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        Comments
        <small>Your blog post comments</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Comments</li>
      </ol>
    </section>
    <!-- /.End Page Header -->


    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
			    <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			            	<th>Author</th>
			            	<th>Comment</th>
			            	<th>In Response To</th>
			            	<th>Submitted On</th>
			            	<th>Action</th>
			            </tr>
			        </thead>
				    <tfoot>
					    <tr>
					    	<th>Author</th>
					    	<th>Comment</th>
			            	<th>In Response To</th>
			            	<th>Submitted On</th>
			            	<th>Action</th>
					    </tr>
					</tfoot>
			        <tbody>
			        	@foreach($comments as $comment)
				        <tr>
				            <td>{{$comment->name}}</td>
				            <td>{{$comment->content}}</td>
				            <td>{{$comment->post->name}}</td>
				            <td>{{$comment->updated_at->diffForHumans()}}</td>
				            <td>
				            	<a id="edit-comment-{{ $comment->id }}" href="{{route('admin.comments.edit', ['comments' => $comment->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            	<form style="display:inline;" action="{{ route('admin.comments.destroy', ['comments' => $comment->id]) }}" method="POST">
							        {{ csrf_field() }}
							        {{ method_field('DELETE') }}

							        <button type="submit" id="delete-comment-{{ $comment->id }}" class="btn btn-link">
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