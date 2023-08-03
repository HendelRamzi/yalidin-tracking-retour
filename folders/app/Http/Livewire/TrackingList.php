<?php

namespace App\Http\Livewire;

use App\Models\Tracking;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;
use Livewire\WithPagination;

class TrackingList extends Component
{

    use WithPagination;
    // public $trackings  = [] ;
    
    
    public $search ; 
    public $items = []; 



    protected $paginationTheme = 'bootstrap';


    public function selectAll(){
        if(count($this->items) < 1){
            foreach($this->trackings as $tracking){
                array_push($this->items, $tracking->id); 
            }
        }else{
                $this->items = []; 
        }
    }

    public function deleteSelected(){
        try{
            foreach($this->items as $item){
                Tracking::find($item)->delete(); 
            }
            
            
            session()->flash('success', "Tracking code was deleted successfully");
            $this->items = [] ; 
        }catch(ModelNotFoundException $error){
            session()->flash('error', "Tracking code not found in the database");
        }catch(\Exception $error){
            session()->flash('error', "Problem when deleting the tracking code. Please contact the support team");

        }
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function render()
    {
        return view('livewire.tracking-list', [
            'trackings' => Tracking::where('code', "LIKE", "%".$this->search."%")->paginate(20)
        ]);
    }
}
