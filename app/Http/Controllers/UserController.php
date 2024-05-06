<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));

    }

    public function create(){
        $roles=Role::orderBy('name', 'asc')->get();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request){
        $users = new User();
        
        $users->email = $request->input('email');
        $users->name = $request->input('name');
        $users->password = Hash::make($request->input('password'));
        
        //je recupere l'id du role dans le formulaire
        $roleID = $request->role_id;

        //je recupere le role dans la bd en fonction de l'id
        $roles = Role::find($roleID);
        

        $permissions=[];
        
        //pour toutes les permissions attache au role, je stock dans le tableau
            foreach ($roles->permissions as $permission) {

                $permissions[]= $permission;
            }
        

        
        $users->assignRole($roles);
        $users->givePermissionTo($permissions);
        
        $users->save();
        
        return redirect()->route('users.index');
        
    }

    public function edit($id)
    {
       $users = User::find($id);
        //dd($id);
        return view('users.edit' , compact('users'));
       
    }

    public function update(Request $request, $id)
    {
        
        $users = User::find($id);
        $users->email = $request->input('email');
        $users->name = $request->input('name');
        $users->password = Hash::make($request->input('password'));
        
        //je recupere l'id du role dans le formulaire
        $roleID = $request->role_id;

        //je recupere le role dans la bd en fonction de l'id
        $roles = Role::find($roleID);
        $permissions=[];
    
        //pour toutes les permissions attache au role, je stock dans le tableau
            foreach ($roles->permissions as $permission) {

                $permissions[]= $permission;
            }
        $users->assignRole($roles);
        $users->givePermissionTo($permissions);
        $users->save();
        session()->flash("message", "you've update these user");
        return redirect()->route('users.index');
        
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        session()->flash("message", "you've drop these user");
        return redirect()->route('users.index');
    }
}
