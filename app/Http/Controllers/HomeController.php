<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $post;
    private $user;
    public function __construct(Post $post, User $user)
    {
       $this->post = $post;
       $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $suggested_users = $this->getSuggestedUsers();
        $all_posts = $this->post->latest()->get();
        // return $all_posts;
        return view('users.home')
                ->with('all_posts', $all_posts)
                ->with('suggested_users', $suggested_users);
    }

    public function getSuggestedUsers(){
        $all_users = $this->user->all()->except(auth()->user()->id)->take(10);
        $suggested_users = [];
        foreach($all_users as $user){
            if(!$user->isFollowed()){
                $suggested_users[] = $user;
            }
        }
        return $suggested_users;
    }
}
