<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Friend;
use App\Models\Post;
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


        $users = User::whereDoesntHave('senders', function (Builder $query) {
                 $query->where('sender_id' , '=', auth::user()->id)->orWhere('receiver_id', '=', 2);
                 })->where('id', '!=', auth::user()->id)->orderBy('created_at', 'desc')->get();

        $posts = Post::withCount(['likes', 'comments'])->orderBy('created_at', 'desc')->get();

        $confirms = Friend::where('receiver_id', '=', auth::user()->id)->where('status', 1)->get();
        return view('home')->withUsers($users)->withPosts($posts)->withConfirms($confirms);


    }
}
