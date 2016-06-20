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
        <!-- Start Testimonials -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-commenting"></i>
            <span>Testimonials</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('admin.testimonials.index')}}">
                <span>All Testimonials</span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.testimonials.create')}}">
                <span>Add New</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- /.End Testimonials -->
        <!-- Start FAQs -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-life-ring"></i>
            <span>FAQ's</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('admin.faqgroups.index')}}">
                <span>All FAQ's</span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.faqgroups.create')}}">
                <span>Add New</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- /.End FAQs -->
        <!-- Start Media -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i>
            <span>Media</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('admin.media.index')}}">
                <span>All Media</span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.media.create')}}">
                <span>Add New</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- /.End Media -->
        <!-- Start Photo Gallery -->
        <li class="treeview">
          <a href="#">
            <i style="font-size: inherit;" class="fa material-icons">photo_library</i>
            <span>Photo Galleries</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('admin.gallery.index')}}">
                <span>All Galleries</span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.gallery.create')}}">
                <span>Add New</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- /.End Photo Gallery -->
        <!-- Start Comments -->
        <li>
          <a href="{{route('admin.comments.index')}}">
            <i class="fa fa-comments-o"></i>
            <span>Comments</span>
          </a>
        </li>
        <!-- /.End Pages -->
        <!-- Start Appearance -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-paint-brush"></i>
            <span>Appearance</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('admin.menu.index')}}">
                <span>Menus</span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.code.index')}}">
                <i class="fa fa-code"></i>
                <span>Template Codes</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- /.End Appearance -->
        <!-- Start Users -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('admin.users.index')}}">
                <span>All Users</span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.users.create')}}">
                <span>Add New</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- /.End Users -->
        <!-- Start Users -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Settings</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('admin.setting.general')}}">
                <span>General</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- /.End Users -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
