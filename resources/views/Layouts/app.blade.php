{{--
    Creacion de la primera plantilla de blade
    Este archivo funcionará como archivo base para algunas otros archivos o páginas, en este tipo de archivos se podra
        localizar ciertas directivas de Laravel, uno de las principales es @yield() en la cuale se rempleza contenido

--}}
<html>
    <head>
        <title> Mechanicus - @yield('title') </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <body>
            {{-- Creaci+on de barra de navegación --}}
            <nav class="navbar navbar-dark bg-primary">
                <a href="" class="navbar-brand">Mechanicus</a>
            </nav>

            <div class="container">
                @yield('content')
            </div>

        </body>
    </head>
</html>
