<?php

namespace App\Http\Controllers;

use App\Models\Hospitals;
use Illuminate\Http\Request;

class HospitalsController extends Controller {
    
    public function showhospitals(Hospitals $hospital) {
        return view('deleteHospitals')->with('hospitalArr', Hospitals::all());
    }

    public function destroy(Hospitals $hospital, $hospital_id) {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        Schools::destroy(array('hospital_id', $hospital_id));
        $_SESSION['alertMessage']= "Hospital deleted successfully.";
        return redirect()->back();    
    }

    public function store(Request $request) {
        $request->validate([
            'name-field' => 'required',
            'email-field' => 'required',
            'phone-field'=> 'required',
            'addr-field'=> 'required',
            'zipcode-field'=> 'required',
            'specialty-field'=> 'required',
        ]);

        $hospital=new Hospitals;
        $hospital->hospital_name=$request->input('name-field');
        $hospital->email=$request->input('email-field');
        $hospital->phone=$request->input('phone-field');
        $hospital->address=$request->input('addr-field');
        $hospital->zipcode=$request->input('zipcode-field');
        $hospital->specialty=$request->input('specialty-field');
        $hospital->save();
            
        return redirect()->back();
    }
}

?>
