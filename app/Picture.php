<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{

	//bdd
	protected $fillable = [
		'link'
	];

    public function products() {
    	return $this->belongsTo(Product::class);
    }
}
