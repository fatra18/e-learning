<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use App\Models\Join;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class DashboardController extends Controller
{
    public function index()
    {
        $classes = Course::where('user_id', Auth::user()->id)->limit(3)->orderBy('id','desc')->get();
        $categories = Category::get();
        $users = User::get();
        $videos = Video::get();

        // $class = Course::get();
        $classPop = Join::get();
        // dd($classPop);

        $joins = Join::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $joinses = Join::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(2);
        $joinall = Join::get();

        
        return view('pages.dashboard.dashboard', [
            'classes' => $classes, 
            'categories' => $categories, 
            'users' => $users,
            'videos' => $videos,
            'joins' => $joins,
            'joinses' => $joinses,
            'joinall' => $joinall,
            'classPop' => $classPop
        ]);
    }

    
}
