<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){

        //ricevo i dati
        $data = $request->all();

        //convalido i dati
        $validator = Validator::make( $data,
            [
                'name' => 'required|min:2|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|min:10',
            ],
            [
                'name.required' => 'Il nome è un campo obbligatorio',
                'name.min' => 'Il nome deve contenere almeno :min caratteri',
                'name.max' => 'Il nome non può avere più di :max caratteri',
                'email.required' => 'La email è un campo obbligatorio',
                'email.email' => 'Indirizzo email non corretto',
                'email.max' => 'La email non può avere più di :max caratteri',
                'message.required' => 'Il messaggio è un campo obbligatorio',
                'message.min' => 'Il messaggio deve contenere almeno :min caratteri',
            ]
        );

        // se cè l'errore ti restituisco un json con gli errori e success=false altrimenti salvo nel db
        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }

        //salvo e fillo i dati
        $new_lead = Lead::create($data);

        //invio la mail
        Mail::to('info@boolean.com')->send(new NewContact($new_lead));


        $success = true;

        return response()->json(compact('success'));
    }
}
