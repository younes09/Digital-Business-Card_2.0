<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->email != null) {
            $request->validate([
                'email' => 'email|unique:users|max:255',
            ]);
        }

        if ($request->oldPaswd != null) {
            if (!(Hash::check($request->oldPaswd, Auth::user()->password))) {
                return back()->with('error','Your current password does not matches with the password.');
            }
        }

        if ($request->newPaswd != null) {
            if ($request->newPaswd != $request->confirmPaswd) {
                return back()->with('error','Your new password does not matches.');
            }
        }

        $user = User::find($id);

        $user->name = $request->name;

        if ($request->email != null) {
            $user->email = $request->email;
        }

        if ($request->newPaswd != null) {
            $user->password = bcrypt($request->newPaswd);
        }

        $user->save();

        return back()->with('success','Your informaion are updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        // Delet all user photos if they exists
        $photos = array('photo','logo');

        foreach ($photos as $photo) {
            foreach ($user->cards as $card) {
                if(file_exists(public_path('storage/'.$card->$photo)) && $card->$photo != null){
                    unlink(public_path('storage/'.$card->$photo));
                }
            }
        }

        $user->delete();
        
        return back()->with('message','Deleted succss !');
    }
}
