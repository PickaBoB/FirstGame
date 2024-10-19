@foreach($menu as $item)
    @if(isset($item['submenu']))
        <li class="nav-item dropdown {{ (isset($item['route']) ? (request()->route()->named($item['route']) ? 'active' : '') : '') }}">
            <a class="nav-link dropdown-toggle" href="{{ ($item['url'] ?? route($item['route'])) }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $item['name'] }}
            </a>
            <ul class="dropdown-menu">
                @foreach($item['submenu'] as $subitem)
                    @include('components.navbar.submenu', ['item' => $subitem])
                @endforeach
            </ul>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link {{ (isset($item['route']) ? (request()->route()->named($item['route']) ? 'active' : '') : '') }}" href="{{ ($item['url'] ?? route($item['route'])) }}">{{ $item['name'] }}</a>
        </li>
    @endif
@endforeach
