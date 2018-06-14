<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $links = $user->links;

            return view('home', compact('links'));
        } else {
            return view('auth.login');
        }
    }
}
