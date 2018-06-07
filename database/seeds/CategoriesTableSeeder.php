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
                'title' => 'Food',
                'slug' => 'food',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'category_id' => '1',
                'title' => 'Junk',
                'slug' => 'junk',                
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'category_id' => '1',
                'title' => 'Lite',
                'slug' => 'lite',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'title' => 'Furniture',
                'slug' => 'furniture',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'category_id' => '4',
                'title' => 'Axel',
                'slug' => 'axel',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            [
                'category_id' => '4',
                'title' => 'Minus',
                'slug' => 'minus',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
            ],
            

        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
