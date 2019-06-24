@extends('layouts.master')

	@section('content')

	@include('back.product.partials.flash')

		<h1>Tous les derniers produits</h1>

		<button type="button" class="btn btn-primary create-product"><a href="{{route('admin.create')}}">Nouveau</a></button>

		<table class="table">
			<thead>
		    	<tr>
		      		<th scope="col">Nom</th>
		      		<th scope="col">Catégorie</th>
		      		<th scope="col">Prix</th>
		      		<th scope="col">Etat</th>
		      		<th scope="col">Action</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		@forelse($products as $product)
		    	<tr>
		    		<th scope="row">{{$product->name}}</th>
		      		<td>{{$product->categorie->name}}</td>
		      		<td>{{$product->price}}€</td>
		      		<td>
		      			@if($product->status == 'En solde')
		                <button type="button" class="btn btn-outline-secondary">En solde</button>
		                @else 
		                <button type="button" class="btn btn-outline-success">Standard</button>
		                @endif
		      		</td>
				    <td>
				    	<button type="button" class="btn btn-secondary button-modify"><a href="{{route('admin.edit', $product->id)}}">Modifier</a></button>
                		<form class="delete" method="POST" action="{{route('admin.destroy', $product->id)}}">
			                {{ method_field('DELETE') }}
			                {{ csrf_field() }}
			                <input class="btn btn-danger" type="submit" value="Supprimer" >
			            </form>
                	</td>
		    	</tr>
		    	@empty
        		<p>Aucun titre de présent.</p>
		    	@endforelse
		  	</tbody>
		</table>

		{{$products->links()}}

		@endsection 

		@section('scripts')
		    @parent
		    <script src="{{asset('js/confirm.js')}}"></script>
		@endsection