<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>@yield('titlulo', 'Calculeta')</title>

    <link rel="stylesheet" href="https://unpkg.com/missing.css@1.1.1">

    <link href="https://fonts.bunny.net/css?family=source-sans-3:400,700|m-plus-code-latin:400,700" rel="stylesheet">
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
                <h1>Calculeta®</h1>

                @yield('contenido')

            </main>

            <footer>
                <a href="https://github.com/granjero/calculeta" target="_blank">Calculeta®</a><br>
                Otro Invento sin sentido by jm
            </footer>
        </div>
    </div>
</body>

</html>
