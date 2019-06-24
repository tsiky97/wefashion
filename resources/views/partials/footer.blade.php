@if(\Request::is('admin') || \Request::is('admin/*') || \Request::is('categorie/*') || \Request::is('categorie'))
    &nbsp;
@else
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
@endif