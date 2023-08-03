<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class shelfController extends Controller
{
    public function show($shelf, Request $request){
        try{
            $s = Shelf::find($shelf); 
            return view('admin.shelf.details',[
                'shelf' => $s
            ]);
        }catch(ModelNotFoundException $error){

        }catch(\Exception $e){

        }
    }
}
