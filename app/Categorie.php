<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

	//bdd
	protected $fillable = [
		'name'
	];

    public function products() {
    	return $this->hasMany(Product::class);
    }
}
