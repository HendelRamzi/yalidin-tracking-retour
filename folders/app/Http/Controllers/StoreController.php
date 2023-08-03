<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRequest;
use App\Models\Box;
use App\Models\Shelf;
use App\Models\Store;
use App\Models\Tracking;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{

            // Check if it's not a search request
            if($request['name']){
                $search = $request['name'] ;
                $stores = Store::where('name', 'LIKE', "%$search%")->first(); 
                return view("admin.stores.index",[
                    'stores' =>array($stores) 
                ]);
            }if($request['code']){
                $search = $request['code'] ;
                $tracking = Tracking::where('code', 'LIKE', "%$search%")->first(); 
                return view("admin.stores.index",[
                    'stores' => array($tracking->store)
                ]);
            }else{
                
                $stores = Store::all(); 
                return view("admin.stores.index",[
                    'stores' => $stores
                ]);

            }

        }catch(\Exception $e){
            $request->session()->flash(
                'error', "Could not display the stores list. Contact to support team"
            );
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.stores.create',[
            'boxs' => Box::all()
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStoreRequest $request)
    {
       try{
            $data = $request->validated();


            // Process the shelf returned value
            if (strpos($data['shelf'], '-') !== false) {
                $x = explode("-", $data['shelf']);
                $shlef = Shelf::where('box_id', $x[1])->first(); 
                $data['shelf'] = $shlef->id;
            }else{
                $request->session()->flash(
                    'error', "Problem with the shelf selection. Could not create the stores, please contact to support team"
                );
                return redirect()->back();
            }

            // Save the store in the database
            $store = Store::create([
                'name' => $data['name'],
                "shelf_id" => $data['shelf']
            ]);
       
            // Store the tracking code for that store
            $tack = Tracking::create([
                'code' => $data['code'],
                "store_id" => $store->id,
                "user_id" => Auth::user()->id
            ]);

            $request->session()->flash(
                'success', "The store was created successfuly !"
            );
            return redirect()->back();

       }catch(\Exception $e){
            $request->session()->flash(
                'error', $e->getMessage()
            );
            return redirect()->back();
       }
    }

    /**
     * Display the specified resource.
     */
    public function show($store, Request $request)
    {
        try{
            $store = Store::find($store); 
            
            // Get the shelf information
            $shelf = $store->shelf;

            if($request['code']){
                $search = $request['code'] ;


                $tracking = Tracking::where('code', 'LIKE', "%$search%")->first(); 

                return view('admin.stores.details', [
                    'store' => $store,
                    "shelf" => $shelf,
                    "codes" => array($tracking)
                ]);

            }else{
    
                // Get all the codes
                $codes = $store->codes ;
       
                return view('admin.stores.details', [
                    'store' => $store,
                    "shelf" => $shelf,
                    "codes" => $codes
                ]);
            }

        }catch(ModelNotFoundException $error){
            $request->session()->flash(
                'error',"The store could not be found. Verify the box name or ID"
            );
            return redirect()->back(); 
        }catch(\Exception $e){
            $request->session()->flash(
                'error',"Could not show the store. Contact the support team"
            );
            return redirect()->back(); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $store, Request $request)
    {
        // When delete a box delete also all the shelves
        try{
            $store = Store::find($store);
            if(is_null($store)){
                throw new ModelNotFoundException();
            }

            // Delete the codes related to the store
            foreach($store->codes as $code){
                $code->delete();
            }

            // Delete the box
            $store->delete(); 

            $request->session()->flash(
                'success', "The store was deleted successfuly"
            );
            return redirect()->route('store.index');
            

        }catch(ModelNotFoundException $error){
            $request->session()->flash(
                'error',"The store could not be found. Verify the box name or ID"
            );
            return redirect()->back(); 
        }catch(\Exception $e){
            $request->session()->flash(
                'error',"Could not Delete the store. Contact the support team"
            );
            return redirect()->back(); 
        }
    }
}
