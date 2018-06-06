<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
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
                'display_name' => 'Food',
                'name' => 'food',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'category_id' => '1',
                'display_name' => 'Junk',
                'name' => 'junk',                
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'category_id' => '1',
                'display_name' => 'Lite',
                'name' => 'lite',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'display_name' => 'Travel',
                'name' => 'travel',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'display_name' => 'Furniture',
                'name' => 'furniture',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'category_id' => '5',
                'display_name' => 'Axel',
                'name' => 'axel',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'category_id' => '5',
                'display_name' => 'Minus',
                'name' => 'minus',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            

        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }

        $cat = Category::find(1);
        $cat->category_id = 4;
        $cat->save();
    }
}
