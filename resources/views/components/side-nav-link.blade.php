<li
    class="{{ (request()->segment(2) == $route) ? 'active' : '' }}">
    <a class="nav-link" href="{{ route($route.'.index') }}">
        <i class="{{ $icon }}"></i>
        <span>{{ $name }}</span>
    </a>
</li>
