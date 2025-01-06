<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\User;


class PartyController extends Controller
{

    public function index() {
        $parties = Party::get();

        return response()->json([
            "parties"=> $parties,
        ]);
    }
    

    public function store(Request $request)
    {
        // Obter o utilizador autenticado pelo token Bearer
        $user = auth()->user(); 
  
        if($user->role_id != "2"){
            return response()->json([
               "error" => "Sem permissões" 
            ], 403);
        }

 
        $party = new Party();
        $party->name = $request->input('name');
        $party->date = $request->input('date');
        $party->location = $request->input('location');
     
        $party->save();
    
        return response()->json([
            "message" => "Bem sucedido",
            "party" => $party
        ], 201);
    }

    public function show($id){

        // primeiro parametro do metodo where é o nome do campo na base de dados
        // o segundo é a variavel com que qual a queremos comparar
        $party = Party::where('id',$id)->first();

        // caso a transaction NÃO seja encontrada "cai" neste if
        if(!$party){
            return response()->json([
                "error" => "Party not found"
            ],404);
        }


        return response()->json([
            "party" => $party
        ]);
    
    }


    public function destroy($id) {

        $party = party::where('id', $id)->first();

        if(!$party) {
            return response()->json([
                "error" => "Party does not exists"
            ], 404);
        }

        $party->delete();

        return response()->json([
            "message"=> "Party has been deleted"
        ]);
    }


}

