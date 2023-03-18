  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 " style="position: fixed">
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  @php
                      $settings = DB::table('settings')->first();
                  @endphp
                  <div class="image">
                      <img src="{{ asset($settings->logo) }}"
                          style="height: 98px;
                      width: 120px;
                      margin-bottom: -40px;
                      margin-top: -38px;"
                          alt="User Image">
                  </div>
                  <div class="info">
                      <a href="" style="text-decoration:none" class="d-block">
                          <h6 class="text-light"></h6>
                      </a>
                  </div>
              </div>

              <div class="form-inline">
                  <div class="input-group" data-widget="sidebar-search">
                      <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                          aria-label="Search">
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
                  <a href="{{ route('admin.home') }}" class="nav-link">
                      <i class="nav-icon fas fa-copy text-light"></i>
                      <p class="text-light">
                          Dashboard
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="" class="nav-link">
                      <i class="nav-icon fa-solid fa-user text-light"></i>
                      <p class="text-light">
                          Users
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('users.index') }}" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>All Users</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="" class="nav-link">
                      <i class="nav-icon fa-solid fa-list text-light"></i>
                      <p class="text-light">
                          Categories
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href={{ route('categories.index') }} class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>All Cateogry</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href={{ route('categories.add') }} class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Cateogry</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="{{ route('tools.index') }}" class="nav-link">
                    <i class="nav-icon  fa-solid fa-toolbox text-light"></i>
                      <p class="text-light">
                          Tools
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('tools.index') }}" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>All Tools</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href={{ route('tools.add') }} class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Tool</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="" class="nav-link">
                      <i class="nav-icon fa-solid fa-message text-light"></i>
                      <p class="text-light">
                          Tickets
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('admin.ticket.index') }}" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>All Tickets</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href={{ route('tools.add') }} class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Tool</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="" class="nav-link">
                      <i class="nav-icon fa-solid fa-cart-shopping text-light"></i>
                      <p class="text-light">
                          Orders
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('orders.all') }}" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>All Orders</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="" class="nav-link">
                      <i class="nav-icon fa-brands fa-blogger text-light"></i>
                      <p class="text-light">
                          Blogs
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('blog.index') }}" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>All Blogs</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('blog.add') }}" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Blog</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href={{ route('contact.messages.index') }} class="nav-link">
                    <i class="nav-icon fa-solid fa-envelope text-light"></i>
                      <p class="text-light">
                          Contact Messages
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href={{ route('settings.index') }} class="nav-link">
                    <i class="nav-icon fa-solid fa-gear text-light"></i>
                      <p class="text-light">
                          Settings
                      </p>
                  </a>
              </li>
          </ul>
      </nav>
  </aside>
