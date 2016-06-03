<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{Avatar::create(auth()->user()->name)->toBase64()}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Start Dashboard -->
        <li>
          <a href="{{url('/admin')}}">
            <i class="fa fa-dashboard"></i> 
            <span>Dashboard</span> 
          </a>
        </li>
        <!-- /.End Dashboard -->
        <!-- Start Posts -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-thumb-tack"></i>
            <span>Posts</span>
            <i class="fa fa-angle-left pull-right"></i> 
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('admin.posts.index')}}">
                <span>All Posts</span> 
              </a>
            </li>
            <li>
              <a href="{{route('admin.posts.create')}}">
                <span>Add New</span> 
              </a>
            </li>
          </ul>
        </li>
        <!-- /.End Posts -->
        <!-- Start Pages -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pages</span> 
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('admin.pages.index')}}">
                <span>All Pages</span> 
              </a>
            </li>
            <li>
              <a href="{{route('admin.pages.create')}}">
                <span>Add New</span> 
              </a>
            </li>
          </ul>
        </li>
        <!-- /.End Pages -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>