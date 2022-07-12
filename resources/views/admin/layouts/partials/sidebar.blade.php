<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i></span>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/master/*') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="sub-menu {{ request()->is('admin/master/*') ? 'mm-collapse mm-show' : '' }}" aria-expanded="false">
                        <li class="{{ request()->is('admin/master/jenis-produk/*') ? 'mm-active' : '' }}"><a href="{{ route('admin.master.jenis-produk.index') }}">Jenis Produk</a></li>
                    </ul>
                </li>

                <li class="{{ request()->is('admin/produk/*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.produk.index') }}" class="waves-effect">
                        <i class="bx bx-box"></i></span>
                        <span>Produk</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/promo/*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.promo.index') }}" class="waves-effect">
                        <i class="bx bx-purchase-tag"></i></span>
                        <span>Promo</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/about/*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.about.index') }}" class="waves-effect">
                        <i class="bx bx-user"></i></span>
                        <span>Tentang Saya</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->