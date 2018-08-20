<?php

use Illuminate\Database\Seeder;
use App\FeatureGroup;

class FeatureGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $featureGroups = [
            
            [
                'title' => 'Group1',
            ],
            [
                'title' => 'Group2',
            ],

        ];
        
        foreach ($featureGroups as $featureGroup) {
            FeatureGroup::create($featureGroup);
        }
    }
}
