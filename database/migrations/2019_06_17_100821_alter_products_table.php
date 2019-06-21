<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes'); // ajout d'une clé étrangère 'size_id' qui renvoie à la table size (id) après avoir créer la table size
            $table->unsignedInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories'); // ajout d'une clé étrangère 'categorie_id' qui renvoie à la table categorie (id) après avoir créer la table categorie
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_size_id_foreign');
            $table->dropColumn('size_id');
            $table->dropForeign('products_categorie_id_foreign');
            $table->dropColumn('categorie_id');
        });
    }
}
