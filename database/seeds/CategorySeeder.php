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
            ],
            [
                'name' => 'Sushi',
            ],
            [
                'name' => 'Italiano',
            ],
            [
                'name' => 'Giapponese',
            ],
            [
                'name' => 'Thai',
            ],
            [
                'name' => 'Americano',
            ],
            [
                'name' => 'Indiano',
            ],
            [
                'name' => 'Greco',
            ],
            [
                'name' => 'Afghano',
            ],
            [
                'name' => 'Fusion',
            ],
            [
                'name' => 'Siriano',
            ],
            [
                'name' => 'Brasiliano',
            ],
            [
                'name' => 'Cinese',
            ],
            [
                'name' => 'Dessert',
            ],
        ];

        foreach ($categories as $cat) {
            $newCat = new Category();
            $newCat->name = $cat['name'];
            $newCat->save();
        }
    }
}
