<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totaltask = Task::count();
        $newtask = Task::where('status','=','New')->count();
        $blocktask = Task::where('status','=','Block')->count();
        $completetask = Task::where('status','=','Completed')->count();
        $inproggresstask = Task::where('status','=','In Progress')->count();
        return view('test.dashboard.index',compact('totaltask','newtask','blocktask','completetask','inproggresstask'));
    }
}
