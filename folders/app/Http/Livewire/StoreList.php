<?php

namespace App\Http\Livewire;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;


class StoreList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $items = [] ; 
    public $search ; 


    public function updatingSearch()
    {
        $this->resetPage();
    }


    
    public function render()
    {
        return view('livewire.store-list',[
            'stores' => Store::where('name', "LIKE", "%".$this->search."%")->paginate(10)
        ]);
    }
}
