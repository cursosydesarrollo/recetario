<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');   
        $this->middleware(['permission:ver roles'])->only(['index']);
        $this->middleware(['permission:editar roles'])->only(['edit', 'update']);
    }


    public function index()
    {
        $roles = Roles::paginate();
        return view('roles.index', compact('roles'));
    }
    

    public function edit(Roles $role)
    {
        $perms = Permission::all()->pluck('name', 'id');
        return view('roles.edit', compact('role', 'perms'));
    }
    
    /**
     * Actualizar permisos de Rol
     *
     * @param Request $request
     * @param Roles $role
     * @return void
     */
    public function update(Request $request, Roles $role)
    {
        $role->syncPermissions([$request->get('permissions')]);
        return redirect()->to('/roles')->with('success', 'El rol a sido editado correctamente');
    }
    
}
