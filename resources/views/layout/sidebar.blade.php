<header>
    <div class="<h1>">Calculeta</div>
    <nav>
        <ul role="list">
            @foreach(config('sidebar.menu') as $item)
                <li><a href="{{ $item['href'] }}" @if($loop->first) aria-curren="page" @endif >{{ $item['titulo'] }}</a></li>
            @endforeach
        </ul>
    </nav>
</header>
