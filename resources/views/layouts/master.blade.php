<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>We Fashion ||</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link href="{{asset('css/app-complement.css')}}" rel="stylesheet">

    </head>

    <body class="bg-white">
        <div class="container">
            @include('partials.menu')

            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                    <!-- permet d'étendre le layout pour insérer une vue compiste à l'intérieur-->
                </div>
            </div>
        </div>

        @include('partials.footer')

        @section('scripts')
        <script src="{{asset('js/app.js')}}"></script>
        @show

    </body>
</html>
