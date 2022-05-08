<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <i class="fas fa-user-circle "style="font-size: 2rem; color:white;"></i>
        </div>
       
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
 
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Daftar buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sales" class="nav-link">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Pinjam Buku
              </p>
            </a>
          </li>
          
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn  mx-2">  <span class="text-danger"> Log Out <i class="fas fa-sign-out-alt mx-1"></i></span> </button>
            </form>
          </li>
        </ul>
      </nav>

    </div>
  </aside>