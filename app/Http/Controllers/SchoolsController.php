<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class SchoolsController extends Controller {
    
    public function store(Request $request) {
        $request->validate([
            'name-field' => 'required',
            'email-field' => 'required',
            'phone-field'=> 'required',
            'addr-field'=> 'required',
            'city-field'=> 'required',
            'zipcode-field'=> 'required',
            'study-field'=> 'required',
        ]);

        $school=new Schools;
        $school->school_name=$request->input('name-field');
        $school->email=$request->input('email-field');
        $school->phone=$request->input('phone-field');
        $school->address=$request->input('addr-field');
        $school->city=$request->input('city-field');
        $school->zipcode=$request->input('zipcode-field');
        $school->max_study_level=$request->input('study-field');
            
        return redirect()->back();
    }
}

?>
