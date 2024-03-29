<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">{{ substr(env('APP_NAME'), 0, 3) }}</a>
    </div>
    <ul class="sidebar-menu">
        @can('system_management_access')
            <li class="menu-header">Sistem</li>
                @can('role_access')
                    <x-side-nav-link name="Jabatan" route="roles" icon="fas fa-user-tag"/>
                @endcan
                @can('permission_access')
                    <x-side-nav-link name="Hak Akses" route="permissions" icon="fas fa-tag"/>
                @endcan
                @can('user_access')
                    <x-side-nav-link name="Pengguna" route="users" icon="fas fa-user"/>
                @endcan
            <li class="menu-header">Pengaturan & Konfigurasi</li>
                @can('appearance_access')
                    <x-side-nav-link name="Tampilan" route="setup-config.appearance" icon="fas fa-tv" />
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
