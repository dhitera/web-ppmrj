<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    
    public function index()
    {
        $title = 'Activity';
        $activities = Activity::all();
        return view('activity', compact('activities', 'title'));
    }

    // public function show($id)
    // {
    //     $title = 'Activity Nope';
    //     $activity = Activity::findOrFail($id);
    //     return view('activities.show', compact('activity', 'title'));
    // }
}
