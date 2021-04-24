<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class HospitalsController extends Controller {
    
    public function store(Request $request) {
        $request->validate([
            'name-field' => 'required',
            'email-field' => 'required',
            'phone-field'=> 'required',
            'addr-field'=> 'required',
            'city-field'=> 'required',
            'zipcode-field'=> 'required',
            'specialty-field'=> 'required',
        ]);

        $hospital=new Hospitals;
        $hospital->hospital_name=$request->input('name-field');
        $hospital->email=$request->input('email-field');
        $hospital->phone=$request->input('phone-field');
        $hospital->address=$request->input('addr-field');
        $hospital->city=$request->input('city-field');
        $hospital->zipcode=$request->input('zipcode-field');
        $hospital->specialty=$request->input('specialty-field');
            
        return redirect()->back();
    }
}

?>
