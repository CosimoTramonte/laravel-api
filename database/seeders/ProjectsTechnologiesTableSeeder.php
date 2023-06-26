<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectsTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            //ci serve un'entità di una delle due tabelle
            $project = Project::inRandomOrder()->first();
            //il metodo della relazione che sta nel model
            $technology_id = Technology::inRandomOrder()->first()->id;


            // fai una query che cerca se esiste un record nella tabella ponte con  $project e $technology_id
            // se non esiste, fa l'attach


            $isAlreadyExist = DB::table('project_technology')
            ->where('project_id', $project->id)
            ->where('technology_id', $technology_id)
            ->count(); // query;

            if (!$isAlreadyExist) {
                //e utilizzo il metodo attach()
                $project->technologies()->attach($technology_id);
            }
        }
    }
}
