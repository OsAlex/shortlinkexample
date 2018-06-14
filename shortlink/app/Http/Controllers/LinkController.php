<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;

class LinkController extends Controller
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
     * store link
     *
     */
    public function create()
    {
        if (!auth()->user()) {
            abort('403');
        }

        $url = Input::has('full') ? Input::get('full') : '';
        $is_url = filter_var($url, FILTER_VALIDATE_URL) !== false;
        if (!$is_url) {
            Session::flash('error', 'Wrong url');
            return Redirect::back()->withInput($data);
        }

        Input::merge(['user_id' => auth()->user()->id]);
        $result = Link::create(Input::all());

        return Redirect::back()->withInput($data);
    }

    public function redirect($code)
    {
        $link = Link::where('short', $code)->first();

        if ($link) {
            return Redirect::to($link->full);
        } else {
            Session::flash('error', 'Wrong url');
            return redirect()->route('home');
        }
    }
}

