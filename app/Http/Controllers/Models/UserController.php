<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
   public function show() {
       return view('admin', ['users' => User::all()]);
   }
   public function showOne($id) {
       $user = User::find($id);
       $role = $user->assignRole();
       $roles = Role::all();
       return view('one_user', ['user' => $user, 'role' => $role, 'roles' => $roles]);
   }
   public function edit(Request $request, $id) {
       $user = User::find($id);
       if ($request -> isMethod('post')) {
           $data = $request->validate(
               ['role' => 'required',]
           );
           $user->removeRole($user->getRoleNames()[0]);
           $user->assignRole($data['role']);
           return redirect()->refresh();
       }
   }
}
