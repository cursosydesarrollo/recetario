<?php

namespace App\Http\Controllers;

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
        return view('roles.edit', compact('role'));
    }
    

    public function update(Request $request, Roles $role)
    {
        return redirect()->to('/roles');
    }
    
}
