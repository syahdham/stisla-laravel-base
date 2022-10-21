<li class="dropdown {{ request()->routeIs($route.'.*') }}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="{{ $icon }}"></i>
        <span>{{ $name }}</span>
    </a>
    <ul class="dropdown-menu">
        {{ $slot }}
    </ul>
</li>
