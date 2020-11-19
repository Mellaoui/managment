<?php

namespace App\Http\Controllers\API;

use App\Patient;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientController extends Controller
{


    
  
    /**
        * Create a new controller instance.
        *
        * @return void
    */
    public function __construct()
    {
        $this->middleware('api');
    }

    /**


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $id = auth('api')->user()->id;
        return response()->json([
            'patients' => Patient::latest()->get()
        ],response::HTTP_OK); 

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
             'name'=> 'required',
             'age'=> 'required',
             'gender'=> 'required',
             'phone' => 'required',
             'status' => 'required',
             
         ]);
         
         //return $request->all();
         return Patient::create([
             'name' => $request ['name'],
             'age' => $request ['age'],
             'gender'=>$request ['gender'],
             'phone' => $request ['phone'],
             'status' => $request ['status'],
             'working' => $request ['working'],
             'salary' => $request ['salary'],
             'reason' => $request ['reason'],
             'user_id' => auth('api')->user()->id
         ]);  
       /*  $attributes['user_id'] = auth('api')->user()->id; //Adds current user's id
         Patient::create($attributes);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*return response()->json([
            'patients' => Patient::where('id', $id)->first()
        ],response::HTTP_OK);
*/
        
    }
     
    

    public function profile(Request $request, $id)
    {
        return response()->json([
            'patients' => Patient::findOrFail($id)
        ],response::HTTP_OK); 
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'salary' => 'required'   
        ]);
        $patient->update($request->all());
        return  ['message' => 'updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $patient = Patient::findOrFail($id);
        //delete user
        $patient->delete();
        return ['message'=>'user deleted'];

    }
}
