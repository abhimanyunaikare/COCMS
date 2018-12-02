<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Role;
    use App\Permission;
    use Session;
    
    class RoleController extends Controller
    {
    
        public function index()
        {
            $roles = Role::all();
            return view('manage.roles.index')->withRoles($roles);
        }
        
        public function create()
        {
            $permissions = Permission::all();
            return view('manage.roles.create')->withPermissions($permissions);
        }
        
        public function store(Request $request)
        {
            
            $this->validate($request, [
              'display_name' => 'required|max:255',
              'name' => 'required|max:100|alpha_dash|unique:role,name',
              'description' => 'sometimes|max:255'
            ]);
            
            $role = new Role();
            $role->display_name = $request->display_name;
            $role->name = $request->name;
            $role->description = $request->description;
            
            if($role->save())
            {
                Session::flash('success', 'Successfully created the new '. $role->display_name . ' role in the database.');
                
                if ($request->permissions) {
                    $role->syncPermissions(explode(',', $request->permissions));
                }
            }
            else
            {
                Session::flash('Error', 'Role was not added!');
            }
             
            return redirect()->route('roles.show', $role->id);
        }
        
         
        public function show($id)
        {
            $role = Role::where('id', $id)->with('permissions')->first();
            return view('manage.roles.show')->withRole($role);
        }
        
         
        public function edit($id)
        {
            $role = Role::where('id', $id)->with('permissions')->first();
            $permissions = Permission::all();
            return view('manage.roles.edit')->withRole($role)->withPermissions($permissions);
        }
        
         
        public function update(Request $request, $id)
        {
            $this->validate($request, [
              'display_name' => 'required|max:255',
              'description' => 'sometimes|max:255'
            ]);
            
            $role = Role::findOrFail($id);
            $role->display_name = $request->display_name;
            $role->description = $request->description;
            
            if($role->save())
            {
                Session::flash('success', 'Successfully updated the new '. $role->display_name . ' role in the database.');
                
                if ($request->permissions) {
                    $role->syncPermissions(explode(',', $request->permissions));
                }
            }
            else
            {
                Session::flash('Error', 'Role was not added!');
            }
             
            return redirect()->route('roles.show', $id);
        }
    }