<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{url('home')}}">
        <i class="bi bi-grid"></i>
        <span>{{__('admin.Dashboard')}}</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>{{__('admin.Users')}}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
        <a href="{{route('users.index')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.All Users')}}</span>
          </a>
        </li>
        <li>
          <a href="{{route('users.create')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.Add User')}}</span>
          </a>
        </li>

      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#cat-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>{{__('admin.Categories')}}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="cat-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('categories.index')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.All Categories')}}</span>
          </a>
        </li>
        <li>
          <a href="{{route('categories.create')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.Add Categories')}}</span>
          </a>
        </li>

      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>{{__('admin.Products')}}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('products.index')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.All Products')}}</span>
          </a>
        </li>
        <li>
          <a href="{{route('products.create')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.Add Products')}}</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>{{__('admin.Services')}}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('services.index')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.All Services')}}</span>
          </a>
        </li>
        <li>
        <a href="{{route('services.create')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.Add Services')}}</span>
          </a>
        </li>
   
      </ul>
    </li><!-- End Charts Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gem"></i><span>{{__('admin.Brands')}}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('brands.index')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.All Brands')}}</span>
          </a>
        </li>
        <li>
          <a href="{{route('brands.create')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.Add Brands')}}</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#teams-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person"></i><span>{{__('admin.Team')}}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="teams-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('teams.index')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.All Team')}}</span>
          </a>
        </li>
        <li>
          <a href="{{route('teams.create')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.Add Team')}}</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-earmark"></i><span>{{__('admin.Blogs')}}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('blogs.index')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.All Blogs')}}</span>
          </a>
        </li>
        <li>
          <a href="{{route('blogs.create')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.Add Blogs')}}</span>
          </a>
        </li>
      </ul>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>{{__('admin.Settings')}}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('settings.index')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.All settings')}}</span>
          </a>
        </li>
        <li>
          <a href="{{route('settings.create')}}">
            <i class="bi bi-circle"></i><span>{{__('admin.Add settings')}}</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->



    
  
  </ul>

</aside><!-- End Sidebar-->