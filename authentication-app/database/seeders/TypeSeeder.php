<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();

        $types = ['Frontend','Backend','Devops'];
        foreach ($types as $type) {
            $new_type = new Type();

            $new_type->project_type = $type;

            $new_type->save(); 
        }
    }
}
