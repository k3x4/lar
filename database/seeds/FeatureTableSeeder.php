<?php

use Illuminate\Database\Seeder;
use App\Feature;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            
            [
                'title' => 'Air Condition',
                'feature_group_id' => '1',
                'status' => 'publish'
            ],
            [
                'title' => 'Αποθήκη',
                'feature_group_id' => '1',
                'status' => 'publish'
            ],

            [
                'title' => 'Πάρκινγκ',
                'feature_group_id' => '2',
                'status' => 'publish'
            ],
            [
                'title' => 'Υδραυλικό τιμόνι',
                'feature_group_id' => '2',
                'status' => 'publish'
            ],
            [
                'title' => 'Ζάντες αλουμινίου',
                'feature_group_id' => '2',
                'status' => 'publish'
            ],

        ];
        
        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
