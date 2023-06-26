<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Kind;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $new_project = new Project();
            //prende il primo elemento random della tabella Type e gli prende l'id per poi salvarlo qui
            $new_project->kind_id = Kind::inRandomOrder()->first()->id;
            $new_project->name = $faker->sentence(3);
            $new_project->slug = Project::generateSlug($new_project->name);
            $new_project->type = $faker->sentence(2);
            $new_project->description = $faker->text(1000);
            $new_project->project_start = $faker->date();
            $new_project->end_of_project = $faker->date();
            $new_project->number_of_collaborators = $faker->numberBetween(1, 30);
            $new_project->save();
        }
    }
}
