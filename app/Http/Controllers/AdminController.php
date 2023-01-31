<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(view()->exists('valex.'.$id)){
            return view('valex.'.$id);
        }
        else
        {
            return view('valex.404');
        }
    }

    public function show_users()
    {
        $users = User::all();
        return view('admin.index',compact('users'));
    }

    public function show_user(User $user){
        return view('admin.show_user',compact('user'));
    }

    public function edit_user(User $user){
        return view('admin.edit_user',compact('user'));
    }

    public function update_user_plan(Request $request, User $user)
    {
        $user->role = $request->role;
        $user->plan = $request->plan;
        $user->save();

        return back()->with('success','User updated successfully ');
    }

    public function delet_user(User $user)
    {
        return 'delet = '.$user;
    }
}
