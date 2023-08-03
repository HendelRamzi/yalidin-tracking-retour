<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrackingRequest;
use App\Models\Store;
use App\Models\Tracking;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
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

            if($request['code']){
                $search = $request['code'] ; 
                $trackings = Tracking::where('code' , "LIKE", "%$search%")->first(); 
                if(isset($trackings)){
                    return view('admin.tracking.index', [
                        'trackings' => array($trackings),
                        "search" => true,
                    ]);
                }else{
                    $request->session()->flash(
                        'error',"The tracking code do not exist."
                    );
                    return redirect()->route("tracking.index");
                }
            }
            
            $trackings = Tracking::all(); 
            return view('admin.tracking.index', [
                'trackings' => $trackings
            ]);
        }catch(\Exception $error){
            $request->session()->flash(
                'error',"Could not display the tracking list. Contact the support team"
            );
            return redirect()->back(); 
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTrackingRequest $request)
    {
        try{
            $data = $request->validated(); 

            // Check if is unique
            $duplicate = Tracking::where('code' , $data['code'])->count(); 
            if($duplicate >= 1){
                $request->session()->flash(
                    'error', "Code aleardy exist. Must be unique"
                );
                return redirect()->back(); 
            }

            // Store the tracking 
            Tracking::create([
                'code' => $data['code'],
                "store_id" => $data['store_id'],
                "user_id" => Auth::user()->id, 
            ]) ; 

            $request->session()->flash(
                'success', "The Tracking code was deleted successfuly"
            );
            return redirect()->back();


        }catch(\Exception $e){
            $request->session()->flash(
                'error', "Could not create the new code. Please contact the support team"
            );
            return redirect()->back(); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy($tracking, Request $request)
    {   
        
        try{
            $track = Tracking::find($tracking);
            if(is_null($track)){
                throw new ModelNotFoundException();
            }


            // Check if it's the last one then
            // Delete the store with it 
            $x = Tracking::where('store_id', $track->store_id)->count(); 

            if($x == 1){
                Store::find($track->store_id)->delete(); 
            }

            // Delete the box
            $track->delete(); 


            $request->session()->flash(
                'success', "The tracking code was deleted successfuly"
            );
            return redirect()->route('tracking.index');
            

        }catch(ModelNotFoundException $error){
            $request->session()->flash(
                'error',"The tracking code could not be found. Verify the box name or ID"
            );
            return redirect()->back(); 
        }catch(\Exception $e){
            $request->session()->flash(
                'error',"Could not Delete the tracking code. Contact the support team"
            );
            return redirect()->back(); 
        }
    }
}
