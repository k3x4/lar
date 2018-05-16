<?php

use Illuminate\Database\Seeder;
use App\Listing;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listings = [
            
            [
                'title' => 'Neque porro quisquam est',
                'slug' => 'neque-porro-quisquam-est',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'title' => 'Ut sapien erat, convallis',
                'slug' => 'ut-sapien-erat-convallis',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'title' => 'Sed aliquam felis',
                'slug' => 'sed-aliquam-felis',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'title' => 'Maecenas volutpat ligula',
                'slug' => 'maecenas-volutpat-ligula',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],

        ];
        
        foreach ($listings as $listing) {
            Listing::create($listing);
        }
    }
}
