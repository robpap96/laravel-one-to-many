<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
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
        // Schema::disableForeignKeyConstraints();
        Type::truncate();
        // Schema::enableForeingKeyConstraints();

        $types = ['Frontend','Backend','Devops'];
        foreach ($types as $type) {
            $new_type = new Type();

            $new_type->name = $type;
            $new_type->slug = Str::slug($new_type->name, '-');

            $new_type->save(); 
        }
    }
}
