@extends('layouts.master')

  @section('content')

    <div class="container">
      <div class="row">
        <div class="col">
          @if(!empty($product->picture))
          <img class="card-img-top img-fluid" src="{{asset('images/'.$product->picture->link)}}" alt="">
          @endif
        </div>
        <div class="col">
          <div class="card-body">
            <h3 class="card-title">{{$product->name}}</h3>
            <h4>{{$product->price}}€</h4>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text">Taille du produit : {{$product->size->name}}</p>
          </div>
        </div>
      </div>
    </div>

  @endsection