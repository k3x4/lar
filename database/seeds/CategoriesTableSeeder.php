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
                'name' => 'Food',
                'display_name' => 'food',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'category_id' => '1',
                'name' => 'Junk',
                'display_name' => 'junk',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'category_id' => '1',
                'name' => 'Lite',
                'display_name' => 'lite',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'name' => 'Travel',
                'display_name' => 'travel',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'name' => 'Furniture',
                'display_name' => 'furniture',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'category_id' => '5',
                'name' => 'Axel',
                'display_name' => 'axel',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'category_id' => '5',
                'name' => 'Minus',
                'display_name' => 'minus',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            

        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
