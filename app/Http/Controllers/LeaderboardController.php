<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaderboardController extends Controller
{
    public function display()
    {
        $leaderboard = Score::all();
        return view('dashboard', ['leaderboard' => $leaderboard]);
    }
}
