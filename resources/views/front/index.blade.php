@extends('layouts.master')

	@section('content')

		<div class="container">
			<h1>Tous les derniers produits</h1>
			<p>{{$count}} articles.</p>
			<div class="row">
				<div class="col">
					<div class="row">
						@forelse($products as $product)
						<div class="col-12 col-md-6 col-lg-4">
		                    <div class="card">
		                    	<a href="{{url('product', $product->id)}}" alt="Fiche produit">
		                    		@if(count((array)$product->picture) > 0)
			                        <img class="card-img-top" src="{{asset('images/'.$product->picture->link)}}" alt="Image de la fiche produit">
			                        @endif
			                    </a>
			                    <div class="card-body">
			                        <h4 class="card-title"><a href="{{url('product', $product->id)}}" title="{{$product->name}}"><strong>{{$product->name}}</strong></a></h4>
			                        <div class="row">
			                            <div class="col">
			                                <p class="h4"><a href="{{url('product', $product->id)}}" title="{{$product->name}}">{{$product->price}} €</a></p>
		                                </div>
			                        </div>
		                        </div>
		                    </div>
		                </div>
		                @empty
		                <div class="col-12 col-md-6 col-lg-4">
		                	<p class="card-text">Désolé, il n'y a aucun produit à afficher pour l'instant.</p>
		                </div>
		                @endforelse
		            </div>
		        </div>
		    </div>
		</div>

		{{$products->links()}}

	@endsection 