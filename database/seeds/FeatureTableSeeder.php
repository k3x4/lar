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
            ],
            [
                'title' => 'Αποθήκη',
                'feature_group_id' => '1',
            ],

            [
                'title' => 'Πάρκινγκ',
                'feature_group_id' => '2',
            ],
            [
                'title' => 'Υδραυλικό τιμόνι',
                'feature_group_id' => '2',
            ],
            [
                'title' => 'Ζάντες αλουμινίου',
                'feature_group_id' => '2',
            ],

        ];
        
        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
