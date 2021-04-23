<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Countries;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller {
    public function index(Request $request) {
        if(!isset($_SESSION)) { 
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
                //send mail with login credentials
                Mail::to($userCheckDB[0]["email"])->send(new SignUpEmail( $userCheckDB[0]["username"], $userCheckDB[0]['password']));

            }
        } else {
            $_SESSION['alertMessage'] = "User doesn't exist. Please Signup and try again!";
            return redirect()->back();
        }
    }

    public function store(Request $request) {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        $request->validate([
            'fname-field' => 'required',
            'lname-field'=> 'required',
            'email-field' => 'required',
            'phone-field'=> 'required',
            'role-radio'=> 'required',
            'username-field'=> 'required',
            'password-field'=> 'required',
            'addr-field'=> 'required',
            'city-field'=> 'required',
            'state-field'=> 'required',
            'country-field'=> 'required',
        ]);

        //to check if the email already exists
        $userEmailCheck = Users::where('email' , $request->get('email'))->get();

        //to check if the username already exists
        $userUnameCheck = Users::where('username' , $request->get('username-field'))->get();
        
        if(count($userEmailCheck) > 0) {
            $_SESSION['alertMessage'] = "A user already exists with this email. Please use a different email";
            return redirect()->back();
        }
        elseif(count($userUnameCheck) > 0) {
            $_SESSION['alertMessage']= "Username already taken. Please use a different one";
            return redirect()->back();
        }
        else {  
            $user=new Users;
            $user->f_name=$request->input('fname-field');
            $user->l_name=$request->input('lname-field');
            $user->email=$request->input('email-field');
            $user->user_role=$request->input('role-radio');
            $user->phone=$request->input('phone-field');
            $user->username=$request->input('username-field');
            $user->user_password=$request->input('password-field');
            $user->address=$request->input('addr-field');
            $user->city=$request->input('city-field');
            $user->home_state=$request->input('state-field');
            // $countryID = Countries::where('name' , $request->get('country-field'))->get();
            // $countryID=(int)$countryID[0]['country_id'];
            // $user->country_id=$request->input($countryID);
            $user->save();
            $_SESSION['alertMessage']= "Registration successful! Credentials have been sent to your email.";
            
            return redirect('/login');    
        }
    }

    public function destroy(Users $user,$id) {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        Users::destroy(array('user_id',$id));
        $_SESSION['alertMessage']= "User deleted successfully.";
        return redirect()->back();    
    }
}
?>
