<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    //

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index(){
        $all_users = $this->user->withTrashed()->get();
        return view('admin.users.index')->with('all_users', $all_users) ;
    }

    public function deactivate($id){
        $user = $this->user->find($id);
        $user->delete();

        return back();

    }
    public function restore($id){
        $user = $this->user->withTrashed()->findOrFail($id);
        $user->restore();

        return back();
    }
}
