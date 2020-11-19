<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
     public function addPatient(Request $request)
     {
         $this->validate($request, [
            'name'=> 'required',
            'age'=> 'required',
            'phone' => 'required',
            'wieght' => 'required'
         ]);
     }

     public function updateCity()
     {

     }

     public function deleteCity()
     {

     }

     public function profile($id)
     {
        
     }
}
