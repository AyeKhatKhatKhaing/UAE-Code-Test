@props(['active', 'title', 'route'])
<div class="menu-item">
    <a class="menu-link {{ Sidebar::menuActive($active) }}" href="{{ $route }}">
        @if ($slot->isEmpty())
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
        @else
            <span class="menu-icon">
                <span class="svg-icon svg-icon-2">
                    {{ $slot }}
                </span>
            </span>
        @endif

        <span class="menu-title">{{ $title }}</span>
    </a>
</div>
