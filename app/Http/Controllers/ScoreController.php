<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ScoreController extends Controller
{
    public function index()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        $goal = Goal::where('user_id', $data->id)->get();
        $score = Score::where('user_id', $data->id)->get()->first();

        return view('dashboard', compact('data', 'score', 'goal'));
    }
}
