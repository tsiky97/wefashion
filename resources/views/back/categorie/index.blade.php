@extends('layouts.master')

	@section('content')

	@include('back.categorie.partials.flash')

		<h1>Toutes les catégories</h1>

		<button type="button" class="btn btn-primary create-product"><a href="{{route('categorie.create')}}">Nouveau</a></button>

		<table class="table">
			<thead>
		    	<tr>
		      		<th scope="col">Nom</th>
		      		<th scope="col">Action</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		@forelse($categories as $categorie)
		    	<tr>
		    		<th scope="row">{{$categorie->name}}</th>
		      		<td>
				    	<button type="button" class="btn btn-secondary button-modify-categorie"><a href="{{route('categorie.edit', $categorie->id)}}">Modifier</a></button>
                		<form class="delete" method="POST" action="{{route('categorie.destroy', $categorie->id)}}">
			                {{ method_field('DELETE') }}
			                {{ csrf_field() }}
			                <input class="btn btn-danger" type="submit" value="Supprimer" >
			            </form>
                	</td>
		    	</tr>
		    	@empty
        		<p>Aucune catégorie pour l'instant.</p>
		    	@endforelse
		  	</tbody>
		</table>

		@endsection 

		@section('scripts')
		    @parent
		    <script src="{{asset('js/confirm.js')}}"></script>
		@endsection