<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $roles = Roles::all();
        return view('admin.user.index', compact('users', 'roles'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function edit($user_id){
        $user = User::find($user_id);
        if($user){
            return view('admin.user.edit', compact('user'));
        }
        return redirect()->route('admin/user')->with('message', "User doesn't exist");
    }

    public function fill_data(UserRequest $request, $user){
        $data = $request->validated();
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->slug = Str::slug($data['name'].'-'.$data['surname']);
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);


        return $user;
    }

    public function store(UserRequest $request){
        $user = new User;
        $user = $this->fill_data($request, $user);
        $user->save();

        return redirect()->route('admin/user')->with('message', 'New User created');
    }

    public function update(UserRequest $request, $user_id){
        $user = User::find($user_id);
        if($user){
            $user = $this->fill_data($request, $user);
            $user->update();

            return redirect()->route('admin/user')->with('message', 'User edited');
        }
        return redirect()->route('admin/user')->with('message', "User doesn't exist");
    }

    public function change_role(Request $request, $user_id){
        $user = User::find($user_id);
        if($user){
            $user->role = $request['role'];
            $user->update();
            return redirect()->route('admin/user')->with('message', 'Role Changed');
        }
        return redirect()->route('admin/user')->with('message', "User doesn't exist");
    }

    public function delete($user_id){
        $user = User::find($user_id);
        if($user){
            $destination = 'image/user/'.$user->avatar;
            if(File::exists($destination) && $user->avatar != 'avatar.jpg'){
                File::delete($destination);
            }
            User::destroy($user_id);

            return redirect()->route('admin/user')->with('message', 'User deleted');
        }
        return redirect()->route('admin/user')->with('message', "User doesn't exist");
    }
}
