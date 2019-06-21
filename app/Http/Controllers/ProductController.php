<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Size;
use App\Categorie;

class ProductController extends Controller
{
    protected $paginate = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //renvoie la page d'accueil de la partie admin
    public function index()
    {
        $products = Product::paginate($this->paginate);

        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //renvoie le form pour créer un nouveau produit
    public function create()
    {
        $sizes = Size::pluck('name', 'id')->all();
        $categories = Categorie::pluck('name', 'id')->all();

        return view('back.product.create', ['sizes' => $sizes, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //function pour stocker les données saisies en bdd
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|string',
            'price' => 'required|between:0,99.99',
            'reference' => 'required|alpha_num',
            'size_id' => 'integer',
            'categorie_id' => 'integer',
            'status' => 'in:En solde,standard',
            'picture' => 'image|max:3000',
        ]);

        $product = Product::create($request->all());

        // on récupère l'image
        $im = $request->file('picture');

        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');

            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $product->picture()->create([
                'link' => $link
            ]);
        }

        return redirect()->route('product.index')->with('message', 'Le produit a bien été ajouté !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('back.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //renvoie à la page de modif du produit
    public function edit($id)
    {
        $product = Product::find($id);

        $sizes = Size::pluck('name', 'id')->all();
        $categories = Categorie::pluck('name', 'id')->all();

        return view('back.product.edit', compact('product', 'sizes', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //mettre à jour les données dans la bdd
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|string',
            'price' => 'required|between:0,99.99',
            'reference' => 'required|alpha_num',
            'size_id' => 'integer',
            'categorie_id' => 'integer',
            'status' => 'in:En solde,standard'
        ]);

        $product = Product::find($id); // associé les fillables

        $product->update($request->all());

        // image
        $im = $request->file('picture');
        
        // si on associe une image à un product 
        if (!empty($im)) {

            $link = $request->file('picture')->store('images');

            // suppression de l'image si elle existe 
            if(count((array)$product->picture) > 0) {
                Storage::disk('local')->delete($product->picture->link); // supprimer physiquement l'image
                $product->picture()->delete(); // supprimer l'information en base de données
            }

            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $product->picture()->create([
                'link' => $link
            ]);
            
        }

        return redirect()->route('product.index')->with('message', 'Le produit a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //supprimer un produit de la bdd
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Le produit a bien été supprimé.');
    }
}
