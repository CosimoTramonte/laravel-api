<?php

namespace Database\Seeders;

use App\Models\Kind;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KindTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Full Stack',
            'Front End',
            'Back End'
        ];

        foreach($data as $kind){
            $new_kind = new Kind();
            $new_kind->name = $kind;
            $new_kind->slug = Str::slug($kind, '-');
            $new_kind->save();
        }
    }
}
