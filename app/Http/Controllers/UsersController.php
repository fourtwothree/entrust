<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(Request $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        if($request->role){
            $user->attachRoles($request->role);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if($user->name !== 'aquila'){
            $user->name = $request->name;
        }

        $user->email = $request->email;

//        if(!Hash::check($request->password, $user->password)){
//            $user->password = bcrypt($request->password);
//        }

        $user->save();

        if (!empty($request->role)) {
            $user->roles()->sync($request->role);
        } else {
            $user->roles()->detach();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $user =User::findOrFail($id);
        if($user->name !== 'aquila'){
            $user->delete();
        }

        return redirect()->back();
    }
}
