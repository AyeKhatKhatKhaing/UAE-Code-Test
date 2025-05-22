@props(['active', 'title','route'])
<div class="menu-item menu-accordion {{ Sidebar::menuShow($active)  }}">
    <a class="menu-link" href="{{ $route }}">
        <span class="menu-icon">
            <span class="svg-icon svg-icon-2">
                {{ $icon }}
            </span>
        </span>
        <span class="menu-title">{{ $title }}</span>
    </a>
</div>