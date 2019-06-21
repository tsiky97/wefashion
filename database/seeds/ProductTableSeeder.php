<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // on prendra garde de bien supprimer toutes les images avant de commencer les seeders
        Storage::disk('local')->delete(Storage::allFiles());

    	App\Size::create([
        	'name' => 'XS'
        ]);
        App\Size::create([
        	'name' => 'S'
        ]);
        App\Size::create([
        	'name' => 'M'
        ]);
        App\Size::create([
        	'name' => 'L'
        ]);
        App\Size::create([
        	'name' => 'XL'
        ]);
        App\Size::create([
        	'name' => 'XXL'
        ]);

        App\Categorie::create([
        	'name' => 'Femme'
        ]);
        App\Categorie::create([
        	'name' => 'Homme'
        ]);

        //création de 80 livres à partir de la factory
        factory(App\Product::class, 80)->create()->each(function($product) {

            //association un size et une categorie à un produit que nous venons de créer
        	$size = App\Size::find(rand(1,6));
        	$categorie = App\Categorie::find(rand(1,2));

            //pour chaque $product on lui associe un size et une categorie en particulier
        	$product->size()->associate($size);
        	$product->categorie()->associate($categorie);

            //ajout des images
            //on utilise les image fournies pour récupérer les images aléatoirement
            $link = str_random(12) . '.jpg'; //hash de lien pour la sécu (injection de scripts protection)

            //chemin du dossier où récupérer les photos d'exemples
            $chem_img = "public/images_factory";
            
            //On ouvre le dossier images
            $handle  = opendir($chem_img);
              
            //On parcoure chaque élément du dossier
            while ($file = readdir($handle)) {
                if($file != "." && $file != "..") {
                    $listef[] = $file;
                }
            }
              
            $random_img = rand(0, count($listef)-1); //permet de prendre une image totalement au hasard (RANDom) parmi toutes les images trouvées.

            $file = file_get_contents('public/images_factory/'.$listef[$random_img]); //flux
            Storage::disk('local')->put($link, $file);

            //On ferme le dossier
            closedir($handle);

            $product->picture()->create([
                'link' => $link
            ]);

        	$product->save();

        });
    }
}
