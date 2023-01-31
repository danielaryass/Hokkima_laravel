<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- @can('management_access') --}}
            <li class="{{ request()->is('backsite/product') || request()->is('backsite/product/*') ? 'active' : '' }}">
                <a href="{{ route('backsite.product.index') }}">
                    <i
                        class="{{ request()->is('backsite/product') || request()->is('backsite/product/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i><span
                        class="menu-title" data-i18n="product">Product</span>
                </a>
            </li>
            <li class="{{ request()->is('backsite/cart') || request()->is('backsite/cart/*') ? 'active' : '' }}">
                <a href="{{ route('backsite.cart.index') }}">
                    <i
                        class="{{ request()->is('backsite/cart') || request()->is('backsite/cart/*') ? 'bx bx-cart-alt bx-flashing' : 'bx bx-cart-alt' }}"></i><span
                        class="menu-title" data-i18n="product">Cart</span>
                </a>
            </li>
            <li
                class="{{ request()->is('backsite/transaction') || request()->is('backsite/transaction/*') ? 'active' : '' }}">
                <a href="{{ route('backsite.transaction.index') }}">
                    <i
                        class="{{ request()->is('backsite/transaction') || request()->is('backsite/transaction/*') ? 'bx bx-cart-alt bx-flashing' : 'bx bx-cart-alt' }}"></i><span
                        class="menu-title" data-i18n="product">Transaksi</span>
                </a>
            </li>
            {{-- @endcan --}}
            @can('distributor_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->is('backsite/tambahproduk/') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                            class="menu-title" data-i18n="Management Access">Distributor Access</span></a>
                    <ul class="menu-content">
                        {{-- <li
                                class="{{ request()->is('backsite/addproduct/') || request()->is('backsite/addproduct/*') ? 'active' : '' }}">
                                <a href="{{ route('backsite.product.create') }}">
                                    <i
                                        class="{{ request()->is('backsite/addproduct') || request()->is('backsite/addproduct/*') ? 'bx bx-list-plus bx-flashing' : 'bx bx-list-plus' }}"></i><span
                                        class="menu-title" data-i18n="product">Daftar Produk</span>
                                </a>
                            </li> --}}

                        <li
                            class="{{ request()->is('backsite/distributor') || request()->is('backsite/distributor/*') ? 'active' : '' }}">
                            <a href="{{ route('backsite.distributor.index') }}"><span class="menu-title"
                                    data-i18n="Dashboard">Tambah Produk</span>
                            </a>
                        </li>
                    </ul>
                @endcan
                @can('management_access')
                <li class=" navigation-header"><span data-i18n="Application">Application</span><i class="la la-ellipsis-h"
                        data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
                </li>
                @can('management_access')
                    <li class=" nav-item"><a href="#"><i
                                class="{{ request()->is('backsite/permission') || request()->is('backsite/permission/*') || request()->is('backsite/*/permission') || request()->is('backsite/*/permission/*') || request()->is('backsite/role') || request()->is('backsite/role/*') || request()->is('backsite/*/role') || request()->is('backsite/*/role/*') || request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') || request()->is('backsite/type_user') || request()->is('backsite/type_user/*') || request()->is('backsite/*/type_user') || request()->is('backsite/*/type_user/*') || request()->is('backsite/addproduct/') || request()->is('backsite/dashboard/') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                                class="menu-title" data-i18n="Management Access">Admin Access</span></a>
                        <ul class="menu-content">
                            {{-- <li
                                class="{{ request()->is('backsite/addproduct/') || request()->is('backsite/addproduct/*') ? 'active' : '' }}">
                                <a href="{{ route('backsite.product.create') }}">
                                    <i
                                        class="{{ request()->is('backsite/addproduct') || request()->is('backsite/addproduct/*') ? 'bx bx-list-plus bx-flashing' : 'bx bx-list-plus' }}"></i><span
                                        class="menu-title" data-i18n="product">Daftar Produk</span>
                                </a>
                            </li> --}}
                            @can('dashboard_access')
                                <li
                                    class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'active' : '' }}">
                                    <a href="{{ route('backsite.dashboard.index') }}"><span class="menu-title"
                                            data-i18n="Dashboard">Dashboard</span>
                                    </a>
                                </li>
                            @endcan
                            <li
                                class="{{ request()->is('backsite/addproduct') || request()->is('backsite/addproduct/*') || request()->is('backsite/*/addproduct') || request()->is('backsite/*/addproduct/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.addproduct') }}">
                                    <i></i><span>Daftar Produk</span>
                                </a>
                            </li>
                            <li
                                class="{{ request()->is('backsite/transactions') || request()->is('backsite/transactions/*') || request()->is('backsite/*/transactions') || request()->is('backsite/*/transactions/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.transaction.trx') }}">
                                    <i></i><span>Daftar Transaksi</span>
                                </a>
                            </li>
                            {{-- @can('permission_access')
                                <li
                                    class="{{ request()->is('backsite/permission') || request()->is('backsite/permission/*') || request()->is('backsite/*/permission') || request()->is('backsite/*/permission/*') ? 'active' : '' }} ">
                                    <a class="menu-item" href="{{ route('backsite.permission.index') }}">
                                        <i></i><span>Permission</span>
                                    </a>
                                </li>
                            @endcan --}}
                            @can('role_access')
                                <li
                                    class="{{ request()->is('backsite/role') || request()->is('backsite/role/*') || request()->is('backsite/*/role') || request()->is('backsite/*/role/*') ? 'active' : '' }} ">
                                    <a class="menu-item" href="{{ route('backsite.role.index') }}">
                                        <i></i><span>Role</span>
                                    </a>
                                </li>
                            @endcan
                            {{-- @can('type_user_access')
                                <li
                                    class="{{ request()->is('backsite/type_user') || request()->is('backsite/type_user/*') || request()->is('backsite/*/type_user') || request()->is('backsite/*/type_user/*') ? 'active' : '' }} ">
                                    <a class="menu-item" href="{{ route('backsite.type_user.index') }}">
                                        <i></i><span>Type User</span>
                                    </a>
                                </li>
                            @endcan --}}
                            @can('user_access')
                                <li
                                    class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'active' : '' }} ">
                                    <a class="menu-item" href="{{ route('backsite.user.index') }}">
                                        <i></i><span>User</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            @endcan

        </ul>
    </div>
</div>

<!-- END: Main Menu-->
