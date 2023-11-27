    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4"style="    background-color: #ffffff;">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="{{asset('backend/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">MCX Mart</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                    <img src="{{asset('backend/assets/avatar/user1.png')}}" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                    <a href="#" class="d-block">mr Admin</a>
                  </div>
                </div>
              </li>
              <li class="nav-item menu-open">
                <a href="{{url('super-admin/dashboard')}}" class="nav-link text-black {{Request::is('super-admin/dashboard')?'active':''}}"style="color:black;">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('slider')}}" class="nav-link {{Request::is('super-admin/slider')?'active':''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p class="text-dark">
                    Sliders
                    {{-- <span class="right badge badge-danger">New</span> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('brands')}}" class="nav-link {{Request::is('super-admin/brand')?'active':''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p class="text-dark">
                    Brands
                    {{-- <span class="right badge badge-danger">New</span> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category')}}" class="nav-link {{Request::is('super-admin/category')?'active':''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p class="text-dark">
                    Category
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products')}}" class="nav-link {{Request::is('super-admin/product')?'active':''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p class="text-dark">
                    Product Management
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('order')}}" class="nav-link {{Request::is('super-admin/order')?'active':''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p class="text-dark">
                    Orders
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('all-user')}}" class="nav-link {{Request::is('super-admin/all-user')?'active':''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p class="text-dark">
                    All Users
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p class="text-dark">
                    Product
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Top Navigation</p>
                    </a>
                  </li>
                </ul>
              </li> --}}

              <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p class="text-dark">Logout</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
    