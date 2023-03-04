<nav id="sidebar" class="sidebar js-sidebar">
		<div class="sidebar-content js-simplebar">
			<a class="sidebar-brand" href="index.html"><span class="align-middle">TOKO BUKU</span></a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="{{ route('dashboard.index') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('datacustomer.index') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Customer</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('datakategori.index') }}">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Data Kategori</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('dataproduk.index') }}">
                            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Data Produk</span>
                        </a>
				    </li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('datapemesanan.index') }}">
                            <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Data Pemesanan</span>
                        </a>
				    </li>
                    @if(session()->get('admin')->role == 2)
                    <li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('datacustomer.index') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Customer</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('datakategori.index') }}">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Data Kategori</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('dataproduk.index') }}">
                            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Data Produk</span>
                        </a>
				    </li>
                    @elseif(session()->get('admin')->role == 1)
                    <li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('datapemesanan.index') }}">
                            <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Data Pemesanan</span>
                        </a>
				    </li>
                    @endif


					

             </ul>
		</div>
</nav>
