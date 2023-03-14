  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="" style="text-decoration:none" class="d-block"> <h6 class="text-light" ></h6> </a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
   
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="nav-icon fas fa-copy text-light" ></i>
          <p class="text-light"> 
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="nav-icon fas fa-copy text-light" ></i>
          <p class="text-light"> 
            Categories
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href={{route('categories.index')}} class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>All Cateogry</p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{route('categories.add')}} class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Cateogry</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{route('tools.index')}}" class="nav-link">
          <i class="nav-icon fas fa-copy text-light" ></i>
          <p class="text-light"> 
            Tools
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('tools.index')}}" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>All Tools</p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{route('tools.add')}} class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Tool</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href={{route('settings.index')}} class="nav-link">
          <i class="nav-icon fas fa-copy text-light" ></i>
          <p class="text-light"> 
            Settings
          </p>
        </a>
      </li>
    </ul>
  </nav>
</aside>