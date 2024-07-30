<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RoleController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $roles=DB::table('roles')
        ->select('roles.id', 
        'roles.role_name', 
        'roles.description')
        ->get();

        return view('pages.role', compact('roles'));
    }

    public function store(Request $request)
    {
        $id = $request->id;

        if ($id == 0) { // create
            $this->validate($request, [
                'role_name' => 'unique:roles,role_name'
            ]);

            $role = new Role();

        } else { // update
            $this->validate($request, [
                'role_name' => 'unique:roles,role_name,' .$id
            ]);

            $role = Role::find($id);
        }
        
        try {        
            $role->role_name=$request->input('role_name');
            $role->description=$request->input('description');
            $role->save();

            return redirect()->route('role.index')->with('success', 'Role Added Sucessfully');

        } catch (\Throwable $th) {
            return redirect()->route('role.index')->with('error', 'Role Added Failed');
        }
    }
}
