<?php
namespace App\Http\Controllers;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notify;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();//Get all permissions
        return view('roles.create', compact('permissions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            ]
        );
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = $request->name;
        $role->save();
        if($request->permissions <> ''){
            $role->permissions()->attach($request->permissions);
        }
        Notify::success('', $title = 'Datos creados correctamente', $options = []);

        return redirect()->route('roles.index')->with('success','Roles added successfully');
    }

     public function edit($id) {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $role = Role::findOrFail($id);//Get role with the given id
    //Validate name and permission fields
        $this->validate($request, [
        ]);
        $input = $request->except(['permissions']);
        $role->fill($input)->save();
        if($request->permissions <> ''){
            $role->permissions()->sync($request->permissions);
        }
        Notify::success('', $title = 'Datos actualizados correctamente', $options = []);


        return redirect()->route('roles.index')->with('success','Roles updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        Notify::success('', $title = 'Datos eliminados correctamente', $options = []);

        return redirect()->route('roles.index')
            ->with('success',
             'Role deleted successfully!');
    }
}
