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

        <!-- Footer -->
        <footer class="page-footer font-small blue pt-4 bg-light">
            
            <div class="container-fluid text-center text-md-left">
                <div class="row">

                    <div class="col-md-6 mt-md-0 mt-3">

                        <h5 class="text-uppercase">Pied de page</h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#">Inscrivez-vous à la newsletter</a></li>
                        </ul>
                    
                    </div>
      
                    <hr class="clearfix w-100 d-md-none pb-3">

                    <div class="col-md-3 mb-md-0 mb-3">

                        <h5 class="text-uppercase">Informations</h5>
                        <ul class="list-unstyled">
                            <li><a href="#!">Mentions légales</a></li>
                            <li><a href="#!">Presse</a></li>
                            <li><a href="#!">Fabrication</a></li>
                        </ul>

                    </div>

                    <div class="col-md-3 mb-md-0 mb-3">

                        <h5 class="text-uppercase">Service Client</h5>

                        <ul class="list-unstyled">
                            <li><a href="#!">Contactez-nous</a></li>
                            <li><a href="#!">Livraison & Retour</a></li>
                            <li><a href="#!">Conditions de vente</a></li>
                        </ul>

                    </div>

                </div>

            </div>

        </footer>
        @section('scripts')
        <script src="{{asset('js/app.js')}}"></script>
        @show

    </body>
</html>
