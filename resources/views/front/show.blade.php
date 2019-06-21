@extends('layouts.master')

  @section('content')

    <div class="container">
      <div class="row">
        <div class="col">
          @if(count((array)$product)>0)
          @if(count((array)$product->picture) > 0)
          <img class="card-img-top img-fluid" src="{{asset('images/'.$product->picture->link)}}" alt="Image de la fiche produit">
          @endif
        </div>
        <div class="col">
          <div class="card-body">
            <h1 class="card-title">{{$product->name}}</h1>
            <h4>{{$product->price}}€</h4>
            <p class="card-text">{{$product->description}}</p>
            <select id="size" name="size_id" class="custom-select custom-select-sm">
              <option selected>Choisissez votre taille</option>
              @foreach($sizes as $id => $name)
              <option value="{{$id}}">{{$name}}</option>
              @endforeach
            </select>

            <button type="button" class="btn btn-primary">Acheter</button>
          </div>
        </div>
        @else
        <p>Il n'y a aucun article à afficher.</p>
        @endif
      </div>
    </div>

  @endsection