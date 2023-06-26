<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kind_id',
        'slug',
        'type',
        'image_original_name',
        'image_path',
        'description',
        'project_start',
        'end_of_project',
        'number_of_collaborators'
    ];

    //il progetto ha un type
    public function kind(){
        return $this->belongsTo(Kind::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    public static function generateSlug($str){

        $slug = Str::slug($str, '-');
        $original_slug = $slug;
        $slug_exixts = Project::where('slug', $slug)->first();
        $c = 1;
        while($slug_exixts){
            $slug = $original_slug . '-' . $c;
            $slug_exixts = Project::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
