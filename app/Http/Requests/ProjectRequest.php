<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255',
            'type' => 'required|min:5|max:255',
            'description' => 'required|min:20',
            "project_start" => "required|date",
            "end_of_project" => "date",
            'number_of_collaborators' => 'required|min:1'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Il Nome è un campo obbligatorio',
            "name.min" => "Il Nome deve avere almeno :min caratteri",
            "name.max" => "Il Nome non deve avere più di :max caratteri",
            'type.required' => 'Il Tipo è un campo obbligatorio',
            "type.min" => "Il Tipo deve avere almeno :min caratteri",
            "type.max" => "Il Tipo non deve avere più di :max caratteri",
            'description.required' => 'La Descrizione è un campo obbligatorio',
            "description.min" => "La Descrizione deve avere almeno :min caratteri",
            "project_start.required" => "La data di inizio progetto è un campo obbligatorio",
            "project_start.date" => "La data di inizio progetto ha un formato sbagliato: seguire il YYYY-MM-DD",
            "end_of_project.date" => "La data di fine progetto ha un formato sbagliato: seguire il YYYY-MM-DD",
            'number_of_collaborators.required' => 'Il Numero dei Collaboratori è un campo obbligatorio',
            "number_of_collaborators.min" => "Il Numero dei Collaboratori deve avere almeno :min caratteri",
        ];
    }
}
