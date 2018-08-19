<?php

use Illuminate\Database\Seeder;
use App\Field;

class FieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            
            [
                'title' => 'TM',
                'type' => 'number',
                'field_group_id' => '1',
            ],
            [
                'title' => 'Οδός',
                'type' => 'textbox',
                'field_group_id' => '1',
            ],
            [
                'title' => 'Αντ. Αξία',
                'type' => 'dropdown',
                'field_group_id' => '2',
            ],
            [
                'title' => 'Έτος κατασκευής',
                'type' => 'number',
                'field_group_id' => '2',
            ],
            [
                'title' => 'Τετραγωνικά',
                'type' => 'number',
                'field_group_id' => '2',
            ],

        ];
        
        foreach ($fields as $field) {
            Field::create($field);
        }
    }
}
