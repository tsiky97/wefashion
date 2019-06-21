@extends('layouts.master')

  @section('content')

  <form method="post" action="{{route('categorie.store')}}">
    {{ csrf_field() }}

    <h1>Ajouter une nouvelle catégorie</h1>

    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name">Nom</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nom">
        @if($errors->has('name'))<div class="alert alert-danger" role="alert">{{$errors->first('name')}}</div>@endif
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>

  </form>

@endsection 