<?php

namespace App\Http\Livewire;

use App\Models\Box;
use App\Models\Store;
use App\Models\Tracking;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateStore extends Component
{

    public $boxs, $box, $shelves = [], $shelf ; 

    public $name, $code ; 

    protected $rules = [
        'name' => 'required',
        'code' => 'required',
        "shelf" => "required"
    ];
 



    public function createStore(){
        // We have the shelf id, the code and information to create the new store

        try{
            $this->validate();

            $store = Store::create([
                "name" => $this->name,
                "shelf_id" => $this->shelf
            ]);
    
            // Store the related code 
            Tracking::create([
                'code' => $this->code,
                "store_id" => $store->id, 
                "user_id" => Auth::user()->id
            ]); 
    
    
            session()->flash('message', 'Store successfully created.');
        }catch(ModelNotFoundException $error){
            session()->flash('error', 'Store Not found.');

        }catch(\Exception $error){
            session()->flash('error', 'Problem when creating the form. Contact the support team');

        }

    }


    // Hooks methods


    public function updatedBox(){
        // dd($this->box); 
        if(empty($this->box)){
            $this->shelves = []; 
        }else{
            $b= Box::find($this->box); 
            $this->shelves = $b->shelves ; 
        }
    }




    public function mount(){
        $this->boxs = Box::all(); 
    }

    public function render()
    {
        return view('livewire.create-store');
    }
}
