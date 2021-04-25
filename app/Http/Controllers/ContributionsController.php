<?php

namespace App\Http\Controllers;

use App\Models\Contributions;
use Illuminate\Http\Request;

class ContributionsController extends Controller {
    public function showcontributions(Contributions $contributions) {
        if(!isset($_SESSION)) { 
            session_start(); 
        }
        return view('contributions')->with('contributionArr', Contributions::all());
    }

    public function showtips(Contributions $contributions) {
        if(!isset($_SESSION)) { 
            session_start(); 
        }
        return view('tips')->with('tipArr', Contributions::all());
    }

    public function destroy(Contributions $contributions, $contribution_id) {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        Contributions::destroy(array('contribution_id', $contribution_id));
        $_SESSION['alertMessage']= "Deleted.";
        return redirect()->back();    
    }

    public function storecontribution(Request $request) {
        if(!isset($_SESSION)) { 
            session_start(); 
        }
        $y='Contribution';
        $request->validate([
            'contribution-input' => 'required',
        ]);
        $contribution=new Contributions;
        $contribution->contribution=$request->input('contribution-input');
        $contribution->user_id=$_SESSION['id'];
        $contribution->$y;
        $contribution->save();
            
        return redirect()->back();
    }

    public function storetip(Request $request) {
        if(!isset($_SESSION)) { 
            session_start(); 
        }
        $x='Tip';
        $request->validate([
            'tip-input' => 'required',
        ]);
        $tip=new Contributions;
        $tip->contribution=$request->input('tip-input');
        $tip->user_id=$_SESSION['id'];
        $tip->$x;
        $tip->save();
            
        return redirect()->back();
    }
}

?>
