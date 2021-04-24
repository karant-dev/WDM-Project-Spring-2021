<?php

namespace App\Http\Controllers;

use App\Models\Contributions;
use Illuminate\Http\Request;

class ContributionsController extends Controller {
    public function showcontributions(Contributions $contributions) {
        // TO-DO query only contributions from table and pass to view
        return view('contributions')->with('contributionArr', Contributions::all());
    }

    public function showtips(Contributions $contributions) {
        // TO-DO query only tips from table and pass to view
        return view('contributions')->with('tipArr', Contributions::all());
    }

    public function destroy(Contributions $contributions, $contribution_id) {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        Contributions::destroy(array('contribution_id', $contribution_id));
        $_SESSION['alertMessage']= "Deleted.";
        return redirect()->back();    
    }

    public function store(Request $request) {
        $request->validate([
            'contribution-input' => 'required',
        ]);

        $contribution=new Contributions;
        $contribution->hospital_name=$request->input('contribution-input');
        // TO-DO pass user ID to the table
        // To-DO pass string 'tip' or 'contribution' to table
        $contribution->save();
            
        return redirect()->back();
    }
}

?>
