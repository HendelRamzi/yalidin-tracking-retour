<?php

namespace App\Http\Livewire;

use App\Models\Box;
use Livewire\Component;

class BoxList extends Component
{

    public $boxs, $name, $items = [];
    public $shelfs ;  
    public $search = '' ;

    protected $queryString = ['search'];


    public function SearchForm(){

    }

    public function mount(){


        if(empty($this->search)){
            $this->boxs = Box::all(); 
        }else{
            $this->boxs = Box::where('name', "LIKE", "%".$this->search."%")->get(); 
        } 
    }



    public function selectAll(){
        if(count($this->items) < 1){
            foreach($this->boxs as $box){
                array_push($this->items, $box->id); 
            }
        }else{
                $this->items = []; 
        }
    }


    public function updated(){
        if(empty($this->search)){
            $this->boxs = Box::all(); 
        }else{
            $this->boxs = Box::where('name', "LIKE", "%".$this->search."%")->get(); 
        }
    }

    public function render()
    {
            return view('livewire.box-list');
    }
}
