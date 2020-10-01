<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notices;
use App\Event;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = DB::table('events')->get();
        $notices = DB::table('notices')->get();
       
        return view('home')->with('notices', $notices)->with('events', $events);
    }
}
