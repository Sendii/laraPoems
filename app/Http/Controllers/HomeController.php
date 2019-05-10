<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow as F;
use App\Puisi as P;
use App\Like as L;
use App\User as U;
use Auth;

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
        return view('home');
    }

    public function profile($name) {
        $id = U::whereName($name)->value('id');
        $data['user'] = U::find($id);
        $data['puisis'] = P::where('user_id', $id)->get();
        $data['likes'] = L::with('Puisi')->get();
        return view('profile.index', $data);
    }

    public function followuser(\App\User $name) {
            // Create a new follow instance for the authenticated user
            $new = new F;
            $new->target_id = $name->id;
            $new->user_id = Auth::user()->id;

            $new->save();
            return back()->with('error', 'You are already following this person');
    }

    public function unfollowuser($id) {
        $ids = U::where('id', $id)->value('id');
        $idss = F::where('target_id', $ids)->value('id');
        $unfollow = F::find($idss)->delete();

        return back();
    }
}
