<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{asset('img_admin/brand/logo_1.png')}}" class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'admin') ? 'active' : '' }}" href="/admin">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Master</span>
        </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'banner') ? 'active' : '' }}" href="/banner">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Banner</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'profilumkm') ? 'active' : '' }}" href="/profilumkm">
              <i class="ni ni-app"></i>
              <span class="nav-link-text">Profil UMKM</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'bahan_baku') ? 'active' : '' }}" href="/bahan_baku">
              <i class="ni ni-app"></i>
              <span class="nav-link-text">Bahan Baku</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'kategori') ? 'active' : '' }}" href="/kategori">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'produk') ? 'active' : '' }}" href="/produk">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Produk</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'resep') ? 'active' : '' }}" href="/resep">
              <i class="ni ni-app"></i>
              <span class="nav-link-text">Resep</span>
            </a>
          </li> -->
    
       
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'stok_produk') ? 'active' : '' }}" href="/stok_produk">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Stok Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'payment') ? 'active' : '' }}" href="/payment">
              <i class="ni ni-tag"></i>
              <span class="nav-link-text">Payment</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'shipping') ? 'active' : '' }}" href="/shipping">
              <i class="ni ni-tag"></i>
              <span class="nav-link-text">Shipping</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'supplier') ? 'active' : '' }}" href="/supplier">
              <i class="ni ni-single-02"></i>
              <span class="nav-link-text">Supplier</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'customer') ? 'active' : '' }}" href="/customer">
              <i class="ni ni-single-02"></i>
              <span class="nav-link-text">Customer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment(1) == 'user') ? 'active' : '' }}" href="/user">
              <i class="ni ni-circle-08"></i>
              <span class="nav-link-text">User</span>
            </a>
          </li>
        </ul>

        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Transaksi</span>
        </h6>
        <!-- Navigation -->
        
        <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
          <a class="nav-link {{ (request()->segment(1) == 'produksi') ? 'active' : '' }}" href="/produksi">
            <i class="ni ni-spaceship"></i>
            <span class="nav-link-text">Produksi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pembelian">
            <i class="ni ni-spaceship"></i>
            <span class="nav-link-text">Pembelian</span>
          </a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="/penjualan">
              <i class="ni ni-cart"></i>
              <span class="nav-link-text">Penjualan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/penjualancustom">
              <i class="ni ni-palette"></i>
              <span class="nav-link-text">Penjualan Custom</span>
            </a>
          </li>

        </ul>

        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <!-- <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Laporan</span>
        </h6> -->
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Laporan Penjualan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Laporan Persediaan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-palette"></i>
              <span class="nav-link-text">Laporan Pembelian</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Laporan Keuangan</span>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <label class="custom-toggle">
              <input type="checkbox">
              <span class="custom-toggle-slider rounded-circle nav-link-text" data-label-off="Light" data-label-on="Dark"></span>
            </label>
          </li> -->
        </ul>
      </div>
    </div>
  </div>
</nav>