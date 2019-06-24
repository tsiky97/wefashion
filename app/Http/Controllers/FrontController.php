<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use App\Size;
use Cache;

class FrontController extends Controller
{
    //variable pour la pagination à 6 côté client
    protected $paginate = 6;

    //fonction index qui va renvoyer dans une vue tous les produits, page d'accueil
    public function index(){

        //récupère le nombre de produit de la sélection
        $count = Product::published()->count();

        $products = Product::orderBy('created_at', 'desc')->published()->paginate($this->paginate);

        return view('front.index', ['products' => $products], ['count' => $count]);

    }

    //fonction indexMen qui va renvoyer dans une vue tous les produits de la catégorie homme, page Homme
    public function indexMen(){

        $count = Product::men()->published()->count();

        $products = Product::orderBy('created_at', 'desc')->published()->men()->paginate($this->paginate);

        return view('front.index', ['products' => $products], ['count' => $count]);

    }

    //fonction indexWomen qui va renvoyer dans une vue tous les produits de la catégorie femme, page Homme
    public function indexWomen(){

        $count = Product::women()->published()->count();

        $products = Product::orderBy('created_at', 'desc')->published()->women()->paginate($this->paginate);

        return view('front.index', ['products' => $products], ['count' => $count]);

    }

    //fonction indexSale qui va renvoyer dans une vue tous les produits de la catégorie sale, page Sale
    public function indexSale(){

        $count = Product::sale()->published()->count();

        $products = Product::orderBy('created_at', 'asc')->published()->sale()->paginate($this->paginate);

        return view('front.index', ['products' => $products], ['count' => $count]);

    }

    //fonction show qui va renvoyer dans une vue la fiche produit
    public function show(int $id){

        $product = Product::find($id);
        $sizes = Size::pluck('name', 'id')->all();

        return view('front.show', ['product' => $product, 'sizes' => $sizes]);
    }
}
