<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kind;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with('kind', 'technologies')->paginate(5);

        return response()->json($projects);
    }

    public function getKinds(){

        $kinds = Kind::all();

        return response()->json($kinds);
    }

    public function getFilteredKind($id){

        $projects = Project::where('kind_id', $id)->with('kind', 'technologies')->paginate(5);

        return response()->json($projects);
    }

    public function getTechnologies(){

        $technologies = Technology::all();

        return response()->json($technologies);
    }

    public function getFilteredTechnology($id){

        $projects = Project::with('kind', 'technologies')
                            ->whereHas('technologies', function(Builder $query) use($id){
                                $query->where('technology_id',$id);
                            })->paginate(5);

        return response()->json($projects);
    }

    public function getDetailProject($slug){

        $project= Project::where('slug', $slug)->with('kind', 'technologies')->first();

        if($project->image_path){
            $project->image_path = asset('storage/' . $project->image_path);
        } else{
            $project->image_path = asset('storage/uploads/no-img.jpg');
            $project->image_original_name = '---no image---';
        }

        return response()->json($project);
    }
}
