<?php

namespace App\Http\Controllers;

use App\Models\Schools;
use Illuminate\Http\Request;

class SchoolsController extends Controller {

    public function showschools(Schools $school) {
        return view('deleteSchools')->with('schoolArr', Schools::all());
    }

    public function destroy(Schools $school, $school_id) {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        Schools::destroy(array('school_id', $school_id));
        $_SESSION['alertMessage']= "School deleted successfully.";
        return redirect()->back();    
    }

    public function store(Request $request) {
        $request->validate([
            'name-field' => 'required',
            'email-field' => 'required',
            'phone-field'=> 'required',
            'addr-field'=> 'required',
            'zipcode-field'=> 'required',
            'study-field'=> 'required',
        ]);

        $school=new Schools;
        $school->school_name=$request->input('name-field');
        $school->email=$request->input('email-field');
        $school->phone=$request->input('phone-field');
        $school->address=$request->input('addr-field');
        $school->zipcode=$request->input('zipcode-field');
        $school->max_study_level=$request->input('study-field');
        $school->save();

        return redirect()->back();
    }
}

?>
