@if(isset($item['divider']))
    <li><hr class="dropdown-divider"></li>
@else
    <li><a class="dropdown-item{{ (isset($item['route']) ? (request()->route()->named($item['route']) ? 'active' : '') : '') }}" href="{{ ($item['url'] ?? route($item['route'])) }}">{{ $item['name'] }}</a></li>
@endif
