<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Link;
use App\Stat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;

use Stevebauman\Location\Facades\Location;

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
            return Redirect::back();
        }

        $stoped_at = Input::has('stoped_at') ? Input::get('stoped_at') : false;
        if ($stoped_at) {
            $stoped_at = Carbon::createFromFormat('d.m.Y H:i', $stoped_at);
            Input::merge(['stoped_at' => $stoped_at]);
        }

        Input::merge(['user_id' => auth()->user()->id]);
        $link = Link::create(Input::all());

        if (empty($link->short)) {
            $link->short = str_random(8);
            $link->save();
        }

        return Redirect::back();
    }

    public function redirect($code)
    {
        $link = Link::where('short', $code)->first();

        if ($link) {
            if (!empty($link->stoped_at) && $link->stoped_at > Carbon::now()) {
                Session::flash('error', 'Lifetime of url is end');
                return redirect()->route('home');
            }

            $position = Location::get();
            if ($position) {
                $stat = Stat::firstOrCreate(['link_id' => $link->id, 'country' => $position->countryCode], ['count' => 0]);
                $stat->count = $stat->count + 1;
                $stat->save();
            }

            return Redirect::to($link->full);
        } else {
            Session::flash('error', 'Wrong url');
            return redirect()->route('home');
        }
    }

    public function stats(Link $link)
    {
        $stats = $link->stats;
        
        return view('stats', compact('stats', 'link'));
    }
}
