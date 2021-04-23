<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class LoginController extends Controller {
    
    public function index(Request $request) {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $request->validate([
            'username-field'=> 'required',
            'password-field' => 'required',
        ]);

        $userCheckDB = Users::where('username' , $request->get('username-field'))->get();

        if(count($userCheckDB) > 0) {
            if(strval($request->get('password-field'))!= strval($userCheckDB[0]['user_password'])) {
                $_SESSION['alertMessage'] = "Incorrect password";
                return redirect()->back();
            } else {
                $_SESSION['alertMessage'] = "You have successfully logged in";
                $_SESSION['username']=$userCheckDB[0]["username"];
                //store query result to session
                $_SESSION['id']=$userCheckDB[0]["user_id"];
                $_SESSION['firstname']=$userCheckDB[0]["f_name"];
                $_SESSION['lastname']=$userCheckDB[0]["l_name"];
                $_SESSION['role']=$userCheckDB[0]["user_role"];
                $_SESSION['email']=$userCheckDB[0]["email"];
                $_SESSION['onboard']=$userCheckDB[0]["onboarding"];
                if($_SESSION['onboard'] == 0) {
                    return redirect('/onboarding');
                }
                elseif($_SESSION['role'] == 'admin') {
                    return redirect('/admindashboard');
                }
                elseif($_SESSION['role']=='superadmin') {
                    return redirect('/superadmin');
                }
                elseif($_SESSION['role']=='immigrant') {
                    return redirect('/immigrants');
                }
                elseif($_SESSION['role']=='visitor') {
                    return redirect('/visitors');
                }
                else {
                    return redirect('/login');
                    $_SESSION['alertMessage'] = "Error logging in";
                }				
            }
        }
        else {
            $_SESSION['alertMessage'] = "User doesn't exist. Please Signup and try again!";
            return redirect()->back();
        }
    }
}
