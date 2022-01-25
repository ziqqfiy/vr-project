<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GoalController extends Controller
{
    public function view()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        $goal = Goal::where('user_id', $data->id)->get();
        return view('dashboard', compact('data', 'goal'));
    }

    public function create(Request $request)
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        $request->validate([
            'description' => 'min:5',
        ]);

        $goal = new Goal();
        $goal->user_id = $data->id;
        $goal->description = $request->description;
        $goal->save();

        return redirect('dashboard')->with('success', 'Goal added');
    }
}