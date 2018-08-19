<?php

use Illuminate\Database\Seeder;
use App\FieldGroup;

class FieldGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fieldGroups = [
            
            [
                'title' => 'FGroup1',
            ],
            [
                'title' => 'FGroup2',
            ],

        ];
        
        foreach ($fieldGroups as $fieldGroup) {
            FieldGroup::create($fieldGroup);
        }
    }
}
