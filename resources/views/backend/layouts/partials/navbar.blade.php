<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.tour.index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{ trans('lang_admin.s') }}<b></b>{{ trans('lang_admin.ell') }}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ trans('lang_admin.sell-tour') }}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">{{ trans('lang_admin.toggle_navigation') }}</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{ trans('lang_admin.0') }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ trans('lang_admin.you_messages') }}</li>
              <li class="footer"><a href="#">{{ trans('lang_admin.see_all_messages') }}</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{ trans('lang_admin.0') }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ trans('lang_admin.you_notifications') }}</li>
              <li class="footer"><a href="#">{{ trans('lang_admin.view_all') }}</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">{{ trans('lang_admin.0') }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ trans('lang_admin.you_tasks') }}</li>
              <li class="footer">
                <a href="#">{{ trans('lang_admin.view_all_tasks') }}</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- Avatar -->
              <span class="hidden-xs">{{ Auth::check() ? Auth::user()->name : 'Viet'}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- Avatar -->
                <p>
                  {{  Auth::check() ? Auth::user()->name : 'Viet' }} {{ trans('lang_admin.developer') }}
                  <small>{{ trans('lang_admin.member_signin') }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <div class="box box-success">
                      <a href="#">{{ trans('lang_admin.followers') }}</a>
                    </div>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div class="box box-info">
                      <a href="#">{{ trans('lang_admin.sales') }}</a>
                    </div>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div class="box box-danger">
                      <a href="#">{{ trans('lang_admin.friends') }}</a>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-success">{{ trans('lang_admin.profile') }}</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout')}}" class="btn btn-default btn-danger">{{ trans('lang_admin.sign_out') }}</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::check())
            @if(isset(Auth::user()->avata))
              <img src="{{ url('backend/image/avatar/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
            @endif
          @else
              <img src="{{ url('bower/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          <p>{{  Auth::check() ? Auth::user()->name : 'Viet' }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('lang_admin.online') }}</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">{{ trans('lang_admin.header_slide') }}</li>
        <li>
          <a href="{{ route('admin.tour.index') }}">
            <i class="fa fa-th"></i> <span>Tour</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.experience.index') }}">
            <i class="fa fa-expand"></i> <span>Kinh nghiệm du lịch</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.hotel.index') }}">
            <i class="fa fa-bed"></i> <span>Khách sạn</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.food.index') }}">
            <i class="fa fa-cutlery"></i> <span>Ẩm thực</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.rent.index') }}">
            <i class="fa fa-bus"></i> <span>Xe du lịch</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.news.index') }}">
            <i class="fa fa-folder-open"></i> <span>Tin tức</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Contact</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Hướng dẩn sử dụng</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>