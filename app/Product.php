<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	//bdd
	protected $fillable = [
		'name', 'description', 'price', 'reference', 'size_id', 'categorie_id', 'status', 'visibility'
	];

	//fonction qui permet d'afficher seulement les produits dont le statut est en solde
	public function scopeSale($query) {
		return $query->where('status', 'En solde');
	}

	//fonction qui permet d'afficher seulement les produits dont le genre est homme
	public function scopeMen($query) {
		return $query->where('categorie_id', '2');
	}

	//fonction qui permet d'afficher seulement les produits dont le genre est femme
	public function scopeWomen($query) {
		return $query->where('categorie_id', '1');
	}

	//fonction qui permet d'afficher seulement les produits dont le produit est publié
	public function scopePublished($query) {
		return $query->where('visibility', 'Publié');
	}

    public function categorie() {
    	return $this->belongsTo(Categorie::class);
    }

    public function size() {
    	return $this->belongsTo(Size::class);
    }

    public function picture() {
    	return $this->hasOne(Picture::class);
    }
}
