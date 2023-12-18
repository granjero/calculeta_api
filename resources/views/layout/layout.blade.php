<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('titlulo', 'Calculeta')</title>

    <link rel="stylesheet" href={{ asset('css/estilo.css') }}>
    <link rel="stylesheet" href={{ asset('css/missing.min.css') }}>

    <link href="https://fonts.bunny.net/css?family=source-hiddenhiddensans-3:400,700|m-plus-code-latin:400,700" rel="stylesheet">
    <script src="{{ asset('js/htmx.min.js') }}"></script>

    <style>
        :root {
            --main-font: "Source Sans 3", -apple-system, system-ui, sans-serif;
        }

        dfn>code {
            font-style: normal;
            text-decoration: 1px dashed var(--muted-fg) underline;
        }

        code a {
            font-family: inherit;
        }
    </style>
</head>

<body>
    <div class="sidebar-layout fullscreen">

        @include('layout.sidebar')

        <div class="">
            <main>
                <div id="contenido">
                    @yield('contenido')
                </div>
            </main>

            <footer>
                <a href="https://github.com/granjero/calculeta" target="_blank">Calculeta®</a><br>
                Otro Invento sin sentido by jm <br><br>
                <a href="mailto:jm@estonoesunaweb.com.ar" target="_blank">
                    <button class="iconbutton" type="button">💌</button>
                </a>
            </footer>
        </div>
    </div>





</body>

</html>
