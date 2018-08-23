<?php

use Illuminate\Database\Seeder;
use App\MediaSize;

class MediaSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mediaSizes = [
            
            [
                'tag' => 'mini',
                'width' => 80,
                'height' => 80,
                'crop' => true
            ],
            [
                'tag' => 'thumb',
                'width' => 150,
                'height' => 150,
                'crop' => true
            ],
            [
                'tag' => 'medium',
                'width' => 300,
                'height' => 300
            ],
            [
                'tag' => 'large',
                'width' => 1024,
                'height' => 1024
            ],
            [
                'tag' => 'gallery',
                'width' => 890,
                'height' => 500,
                'upsize' => true
            ],

        ];
        
        foreach ($mediaSizes as $mediaSize) {
            MediaSize::create($mediaSize);
        }
    }
}
