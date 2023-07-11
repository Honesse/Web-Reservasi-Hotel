      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : 'text-muted' }}" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/adminconfirm*') ? 'active' : 'text-muted' }}" href="/dashboard/adminconfirm">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              Transaksi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/checkout*') ? 'active' : 'text-muted' }}" href="/dashboard/checkout">
              <svg class="bi"><use xlink:href="#calendar3"/></svg>
              Checkout
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/room*') ? 'active' : 'text-muted' }}" href="/dashboard/room">
              <svg class="bi"><use xlink:href="#graph-up"/></svg>
              Status Ketersediaan Kamar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'active' : 'text-muted' }}" href="/dashboard/posts">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              Web Contents
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'active' : 'text-muted' }}" href="/dashboard/categories">
              <svg class="bi"><use xlink:href="#plus-circle"/></svg>
              Tambah Kategori
            </a>
          </li>
        </ul>     
      </div>
      @endcan

    