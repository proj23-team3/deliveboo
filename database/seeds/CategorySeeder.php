<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Pizza',
                'description' => 'La regina della tavola',
                'cat_img' => 'img/pizza_image.jpg'
            ],
            [
                'name' => 'Italiano',
                'description' => 'Pesce, Pasta, Carne, a te la scelta',
                'cat_img' => 'img/italiano.jpg'
            ],
            [
                'name' => 'Giapponese',
                'description' => 'Seduzioni Orientali',
                'cat_img' => 'img/giapponese.jpg'
            ],
            [
                'name' => 'Thai',
                'description' => 'Pad Thai e molto altro',
                'cat_img' => 'img/thai.jpg'
            ],
            [
                'name' => 'Americano',
                'description' => 'Become a vegetarian is a big missed steak!',
                'cat_img' => 'img/americano.jpg'
            ],
            [
                'name' => 'Indiano',
                'description' => 'Uso sapiente delle spezie per piatti indimenticabili',
                'cat_img' => 'img/indiano.jpg'
            ],
            [
                'name' => 'Fusion',
                'description' => 'Moderna, curiosa ed affascinante, scegli il tuo mix',
                'cat_img' => 'img/fusion.jpg'
            ],
            [
                'name' => 'Brasiliano',
                'description' => 'Fai un viaggio in Brasile attraverso la nostra selezione di piatti',
                'cat_img' => 'img/brasiliano.jpg'
            ],
            [
                'name' => 'Cinese',
                'description' => 'I migliori ristoranti Cinesi ad un click da te',
                'cat_img' => 'img/cinese.jpg'
            ]
        ];

        foreach ($categories as $cat) {
            $newCat = new Category();
            $newCat->name = $cat['name'];
            $newCat->description = $cat['description'];
            $newCat->cat_img = $cat['cat_img'];
            $newCat->save();
        }
    }
}
