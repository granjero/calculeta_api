<header>
    <h1>Calculeta</h1>
    <nav>
        <ul role="list">
            @foreach(config('sidebar.menu') as $item)
                <li><button class="info color" hx-get="{{ $item['href'] }}" hx-swap="innerHTML" hx-target="#contenido" hx-indicator="#pensando">{{ $item['titulo'] }}</button></li>
            @endforeach
        </ul>
    </nav>
</header>
