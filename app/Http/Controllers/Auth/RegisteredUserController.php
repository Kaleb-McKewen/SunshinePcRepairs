<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

//for registering users
class RegisteredUserController extends Controller
{
    //show form for creating
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request) {
        //rules
        $userAttributes=$request->validate([
            'name'=>['required'],
            'email'=>['required', 'email', 'unique:users,email'],
            'password'=>['required','confirmed',Password::min(6)],
        ]);
        //create user
        $user = User::create($userAttributes);
        //authorize
        Auth::login($user);
        //redirect
        return redirect('/');
    }

    public function createAdmin(){
        $users = User::where('is_admin','=','0')->get();
        return view('auth.adminAdd', compact('users'));
    }

    public function storeAdmin(User $user){
        $user->is_admin=1;
        $user->save();
        return redirect()->back()->with(['message'=>'User promoted to admin']);
    }

    public function viewAdmin(){
        return view('components.manage.admin-profile');
    }

    public function updateAdmin(Request $request, User $user){
        $user=Auth::user();
        if($request->image){
            $request->validate([
                'image'=>['required', 'image']
            ]);
            $filename = time().'.'.$request->image->getClientOriginalExtension();$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $filename);
            $user->image=$filename;
        }

        $request->validate([
            'role'=>['required', 'string']
        ]);
        

        
        /** @var \App\Models\User $user **/
        $user->role=$request->role;
        $user->save();

        return view('components.manage.dashboard');
    }
}
