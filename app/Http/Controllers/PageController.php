<?php

namespace App\Http\Controllers;
use App\Mail\SignUpEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }

    public function aboutus(){
        return view('aboutus');
    }

    public function contactus(){
        return view('contactus');
    }

    public function login(){
        return view('login');
    }

    public function signup(){
        return view('signup');
    }

    public function admindashboard(){
        return view('admindashboard');
    }

    public function superadmin(){
        return view('superadmin');
    }

    public function immigrants(){
        return view('immigrants');
    }

    public function visitors(){
        return view('visitors');
    }

    public function contributions(){
        return view('contributions');
    }

    public function tips(){
        return view('tips');
    }

    public function deleteUser(){
        return view('deleteUsers');
    }
    
    public function deleteSchool(){
        return view('deleteSchools');
    }
    
    public function deleteHospital(){
        return view('deleteHospitals');
    }

    public function addHospital(){
        return view('hospital');
    }

    public function addSchool(){
        return view('school');
    }

    public function addUser(){
        return view('immigrantdet');
    }

    public function logout(){
        if(!isset($_SESSION)){ 
            session_start(); 
        } 
        session_unset();
        session_destroy();
        session_start(); 
        return redirect('/login');
    }
}
