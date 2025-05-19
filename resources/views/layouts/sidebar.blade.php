<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ auth()->check() ? auth()->user()->getProfilePictureUrl() : asset('adminlte/dist/img/user2-160x160.jpg') }}"
                class="img-circle elevation-2" alt="User Image" style="width: 32px; height: 32px; object-fit: cover;">
        </div>
        <div class="info">
            <a href="{{ url('/profile') }}" class="d-block">{{ auth()->check() ? auth()->user()->nama : 'Guest' }}</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link {{ ($activeMenu == 'level') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Level User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ ($activeMenu == 'user') ? 'active' : ''}}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data User</p>
                </a>
            </li>
            <li class="nav-header">Data Barang</li>
            <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link {{ ($activeMenu == 'kategori') ? 'active' : ''}}">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>Kategori Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang') }}" class="nav-link {{($activeMenu == 'barang') ? 'active' : ''}}">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>Data Barang</p>
                </a>
            </li>
            <li class="nav-header">Data Transaksi </li>
            <li class="nav-item">
                <a href="{{ url('/stok') }}" class="nav-link {{ ($activeMenu == 'stok') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>Stok Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/penjualan') }}" class="nav-link {{($activeMenu == 'penjualan') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>Transaksi Penjualan</p>
                </a>
            </li>
            <li class="nav-header">Data Supplier </li>
            <li class="nav-item">
                <a href="{{ url('/supplier') }}" class="nav-link {{($activeMenu == 'supplier') ? 'active' : ''}}">
                    <i class="nav-icon fas  fa-shipping-fast"></i>
                    <p>Supplier</p>
                </a>
            </li>
            <li class="nav-header">Log out</li>
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link{{($activeMenu == 'logout') ? 'active' : ''}}">
                    <i class="nav-icon fas  fa-sign-out-alt text-danger"></i>
                    <p class="text-danger">Log out</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
