@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        Media Manager
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Media Manager</li>
      </ol>
    </section>
    <!-- /.End Page Header -->


    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
			    <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			            	<th>File</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
			            </tr>
			        </thead>
				    <tfoot>
					    <tr>
					    	<th>File</th>
			            	<th>Author</th>
			            	<th>Date</th>
			            	<th>Action</th>
					    </tr>
					</tfoot>
			        <tbody>
			        	@foreach($attachments as $attachment)
				        <tr>
				            <td>
				            	<div>
				            		<img src="{{app('Media')->getImage($attachment->path, ['w' => 100, 'h' => 100])}}" class="img-reponsive">
				            	</div>
				            	{{$attachment->file_name}}
				            </td>
				            <td>{{$attachment->user->name}}</td>
				            <td>{{$attachment->updated_at->diffForHumans()}}</td>
				            <td>
				            	<a id="edit-attachment-{{ $attachment->id }}" href="{{route('admin.media.edit', ['media' => $attachment->id])}}" class="btn btn-link">
							        Edit
							    </a>
				            </td>
				        </tr>
				        @endforeach
			        </tbody>
				</table>
			</div>
		</div>
    </section>
@stop