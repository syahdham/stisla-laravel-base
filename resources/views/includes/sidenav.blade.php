<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">{{ substr(env('APP_NAME'), 0, 1) }}</a>
    </div>
    <ul class="sidebar-menu">
        @can('master_management_access')
            <li class="menu-header">Master</li>
                @can('category_access')
                    <x-side-nav-link name="Kategori" route="categories" icon="fa fa-th"/>
                @endcan
                @can('product_access')
                    <x-side-nav-link name="Produk" route="products" icon="fas fa-warehouse"/>
                @endcan
        @endcan
        @can('system_management_access')
            <li class="menu-header">Sistem</li>
                @can('role_access')
                    <x-side-nav-link name="Jabatan" route="roles" icon="fa fa-user-tag"/>
                @endcan
                @can('permission_access')
                        <x-side-nav-link name="Hak Akses" route="permissions" icon="fa fa-tag"/>
                @endcan
                @can('user_access')
                        <x-side-nav-link name="Pengguna" route="users" icon="fa fa-user"/>
                @endcan
        @endcan
    </ul>
</aside>


@push('scripts')

    <script>
        $( ".sidebar-menu" ).click(function() {
            $('#loading').show();
        });
    </script>

@endpush
