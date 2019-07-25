  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('user.png')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{route('home.index')}}">
          <i class="fa fa-home"></i> <span>Home</span>
        </a>
      </li>
      <li class="{{ Request::is('masterdata*') ? 'active' : '' }} treeview">
        <a href="#">
          <i class="fa fa-database"></i> <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{route('datapemilih.index')}}"><i class="fa fa-circle-o"></i>Data Calon</a></li>
          <li class="active"><a href="{{route('pemilih.index')}}"><i class="fa fa-circle-o"></i>Data Pemilih</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
