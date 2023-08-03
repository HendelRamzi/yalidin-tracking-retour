<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use App\Models\Box;
use App\Models\Shelf;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BoxController extends Controller
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
            $boxs = Box::all(); 


            return view('admin.box.index', [
                'boxs' => $boxs
            ]);
        }catch(\Exception $error){
            $request->session()->flash(
                'error',"Could not display the Box list. Contact the support team"
            );
            return redirect()->back(); 
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.box.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBoxRequest $request)
    {
        
        try{
            $data = $request->validated(); 
    

            // Create the box
            $box = Box::create([
                'name' => $data["name"]
            ]); 

             // Create 5 etagères
            $names = array('A', 'B', 'C', 
            'D', 'E') ;

            foreach( $names  as $name){
                $t = Shelf::create([
                    'box_id' => $box->id ,
                    "name" => $name
                ]);
            }
               
            $request->session()->flash('success',
            "The Box was successfuly created");

            return redirect()->back();

        }catch(\Exception $error){
            $request->session()->flash(
                'error', $error->getMessage()
            );
            return redirect()->back(); 
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $box, Request $request)
    {
        try{
            $box = Box::find($box);
            if(is_null($box)){
                throw new ModelNotFoundException();
            }

            /**
             * ! Add more informations about the box.
             * ? Ajouter les etagères de la box.
             * ? Ajouter aussi tous les stores et leur code tracking.
             */

            return view('admin.box.details');

        }catch(ModelNotFoundException $error){
            $request->session()->flash(
                'error',"The box could not be found. Verify the box name or ID"
            );
            return redirect()->back(); 
        }catch(\Exception $e){
            $request->session()->flash(
                'error',"Could not display the Box detais. Contact the support team"
            );
            return redirect()->back(); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        try{

            $box = Box::find($id);
            if(is_null($box)){
                throw new ModelNotFoundException();
            }
            
            return view('admin.box.edit');

        }catch(ModelNotFoundException $error){
            $request->session()->flash(
                'error',"The box could not be found. Verify the box name or ID"
            );
            return redirect()->back(); 
        }catch(\Exception $e){
            $request->session()->flash(
                'error',"Could not display the Box edit. Contact the support team"
            );
            return redirect()->back(); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoxRequest $request, string $box)
    {
        dd($request->all()); 
        try{

            $data = $request->validated(); 

            $box = Box::find($box);

        }catch(ModelNotFoundException $error){
            $request->session()->flash(
                'error',"The box could not be found. Verify the box name or ID"
            );
            return redirect()->back(); 
        }catch(\Exception $error){
            $request->session()->flash(
                'error',"Could not update the Box. Contact the support team"
            );
            return redirect()->back(); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($box, Request $request)
    {
        // When delete a box delete also all the shelves
        try{
            $box = Box::find($box);
            if(is_null($box)){
                throw new ModelNotFoundException();
            }

            

            foreach($box->shelves as $shelf){
                foreach($shelf->stores as $store){
                    foreach($store->codes as $code){
                        $code->delete();
                    }
                    $store->delete(); 
                }
                $shelf->delete();
            }

            // Delete the box
            $box->delete(); 

            $request->session()->flash(
                'success', "The box was deleted successfuly"
            );
            return redirect()->back();
            

        }catch(ModelNotFoundException $error){
            $request->session()->flash(
                'error',"The box could not be found. Verify the box name or ID"
            );
            return redirect()->back(); 
        }catch(\Exception $e){
            $request->session()->flash(
                'error',"Could not Delete the Box. Contact the support team"
            );
            return redirect()->back(); 
        }
    }
}
