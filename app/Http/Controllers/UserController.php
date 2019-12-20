<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');   
        $this->middleware(['role:administrador','permission:ver usuarios'])->only(['show', 'index']);
        $this->middleware(['role:administrador','permission:crear usuarios'])->only(['create', 'store']);
        $this->middleware(['role:administrador','permission:editar usuarios'])->only(['edit', 'update']);
        $this->middleware(['role:administrador','permission:suspender usuarios'])->only(['destroy']);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * @get /usuarios
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Metodo Gordo

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);        

        if ($request->input('password')):
            $request['password'] = bcrypt($request->input('password'));
            unset($request['password-confirm']);
        else:
            unset($request['password']);
            unset($request['password-confirm']);
        endif;

        $request['email_verified_at'] = Carbon::now()->format('Y-m-d H:i:s');

        User::create($request->all());

        return redirect()->to('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('users.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {

        $roles = Role::all()->pluck('name', 'id');
        return view('users.edit', compact('usuario', 'roles'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        //dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $usuario->id],
            'password' => ['string', 'min:8', 'confirmed', 'nullable']
        ]);        

        if ($request->input('password')):
            $request['password'] = bcrypt($request->input('password'));
            unset($request['password_confirmation']);
        else:
            unset($request['password']);
            unset($request['password_confirmation']);
        endif;

        $usuario->update($request->all());

        $usuario->syncRoles([$request->get('roles')]);

        return redirect()->to('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        if($usuario->delete()){
            return redirect()->to('/usuarios');
        }
    }
}
