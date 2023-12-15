<header>
    <div class="<h1>">Calculeta</div>
    <nav>
        <ul role="list">
            @foreach(config('sidebar.menu') as $item)
                <li><button class="ok color" hx-get="{{ $item['href'] }}" hx-swap="innerHTML" hx-target="#contenido">{{ $item['titulo'] }}</button></li>
            @endforeach
        </ul>
    </nav>
</header>
