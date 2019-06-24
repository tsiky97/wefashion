<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pictures', function (Blueprint $table) {
            $table->unsignedInteger('product_id'); //clé primaire
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // ajout d'une clé étrangère 'product_id' qui renvoie à la table product (id) après avoir créer la table product
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pictures', function (Blueprint $table) {
            $table->dropForeign('pictures_product_id_foreign');
            $table->dropColumn('product_id');
        });
    }
}
