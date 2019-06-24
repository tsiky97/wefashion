@extends('layouts.master')

  @section('content')

  <form method="post" action="{{route('admin.update', $product->id)}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{method_field('PUT')}}

    <h1>Modifier le produit</h1>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="name">Nom</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}" placeholder="Nom">
        @if($errors->has('name'))<div class="alert alert-danger" role="alert">{{$errors->first('name')}}</div>@endif
      </div>
      <div class="form-group col-md-6">
        <label for="reference">Référence</label>
        <input type="text" class="form-control" name="reference" id="reference" value="{{$product->reference}}" placeholder="Référence">
        @if($errors->has('reference'))<div class="alert alert-danger" role="alert">{{$errors->first('reference')}}</div>@endif
      </div>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" placeholder="Description">{{$product->description}}</textarea>
      @if($errors->has('description'))<div class="alert alert-danger" role="alert">{{$errors->first('description')}}</div>@endif
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="price">Prix (en euros)</label>
        <input type="text" name="price" class="form-control" value="{{$product->price}}" id="price">
        @if($errors->has('price'))<div class="alert alert-danger" role="alert">{{$errors->first('price')}}</div>@endif
      </div>
      <div class="form-group col-md-4">
        <label for="size_id">Taille</label>
        <select id="size_id" name="size_id" class="custom-select">
          <option selected>Choisissez votre taille</option>
          @foreach($sizes as $id => $name)
            <option {{ (!is_null($product->size) and $product->size->id == $id)? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="categorie_id">Catégorie</label>
        <select id="categorie_id" name="categorie_id" class="custom-select">
          <option selected>Choisissez le genre</option>
          @foreach($categories as $id => $name)
            <option {{ (!is_null($product->categorie) and $product->categorie->id == $id)? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="status">Choisissiez le statut</label>
        <div class="form-check">
          <input class="form-check-input" @if(old('status')=='En solde') checked @endif type="radio" name="status" value="En solde" checked>
          <label class="form-check-label" for="En solde">
            En solde
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" @if(old('status')=='standard') checked @endif type="radio" name="status" value="standard">
          <label class="form-check-label" for="standard">
            Standard
          </label>
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="visibility">Choisissiez la visibilité du produit</label>
        <div class="form-check">
          <input class="form-check-input" @if(old('visibility')=='Publié') checked @endif type="radio" name="visibility" value="Publié" checked>
          <label class="form-check-label" for="Publié">
            Publié
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" @if(old('visibility')=='Non-publié') checked @endif type="radio" name="visibility" value="Non-publié">
          <label class="form-check-label" for="Non-publié">
            Non-publié
          </label>
        </div>
      </div>
      <div class="form-group col-md-6">
        <div class="custom-file d-inline align-bottom">
          <input type="file" class="custom-file-input" id="picture" name="picture" accept="image/png, image/jpeg, image/jpg">
          <label class="custom-file-label" for="picture" >Choisissez une image pour votre image</label>
          @if($errors->has('picture'))<div class="alert alert-danger" role="alert">{{$errors->first('picture')}}</div>@endif
          @if($product->picture)
          <img width="300" src="{{url('images', $product->picture->link)}}" alt="">
          @endif
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary float-right">Modifier</button>

  </form>

@endsection 