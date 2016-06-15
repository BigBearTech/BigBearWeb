@extends('admin.layouts.master')

@section('content')
	<!-- Page Header -->
	<section class="content-header">
      <h1>
        General Settings
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">General Settings</li>
      </ol>
    </section>
    <!-- /.End Page Header -->

    <section class="content">
    	<div class="row">
        	<div class="col-md-12">
                <form action="{{route('admin.setting.general.store')}}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="site_title">Site Title</label>
                      <input type="text" class="form-control" name="site_title" id="site_title" value="{{app('Settings')->show($setting, 'site_title')}}">
                      <p class="help-block">Your site title that is used in most of the site.</p>
                    </div>

                    <div class="form-group">
                      <label for="site_title">Email Address</label>
                      <input type="text" class="form-control" name="email" id="email" value="{{app('Settings')->show($setting, 'email')}}">
                      <p class="help-block">This address is used for admin things. Like new users ETC...</p>
                    </div>

					<div class="checkbox">
    					<label>
      						<input type="checkbox" {{app('Form')->isActive(app('Settings')->show($setting, 'search_engine_visibility'), 'true', 'checked')}} name="search_engine_visibility" id="search_engine_visibility" value="true"> Discourage search engines from indexing this site
    					</label>
						<p class="help-block">It is up to search engines to honor this request.</p>
  					</div>

                    <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
                </form>
			</div>
		</div>
    </section>
@stop
