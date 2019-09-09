<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel 5</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        @section('style')
        @show
    </head>
    <body>
        <header>
        </header>

        <nav>
        </nav>

        <section>
            @yield('content')
        </section>

        <footer>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        @section('script')
        @show
    </body>
</html>