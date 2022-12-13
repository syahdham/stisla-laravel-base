<li
    class="{{ request()->routeIs($route.'.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route($route.'.index') }}">
        <i class="{{ $icon }}"></i>
        <span>{{ $name }}</span>
    </a>
</li>
