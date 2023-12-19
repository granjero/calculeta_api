<nav class="breadcrumbs" aria-label="Breadcrumbs">
    <ol>
        @foreach($breadcrumbs  ?? [] as $pancito => $url)
        <li class="clickable color info" hx-get="{{$url }}" hx-swap="innerHTML" hx-target="#contenido" hx-indicator="#pensando">{{ $pancito }}</li>
        @endforeach
    </ol>
</nav>
