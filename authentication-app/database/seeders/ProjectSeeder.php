<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $new_project = new Project();
            $new_project->name = $faker->sentence(2);
            $new_project->content = $faker->text(200);
            $new_project->cover_image = $faker->imageUrl(640, 480, 'animals', true);
            $new_project->slug = Str::slug($new_project->name);
            $new_project->created_on = $faker->datetime();
            $new_project->customer = $faker->name;
            $new_project->private = rand(0,1);

            $new_project->save();
        }
    }
}
