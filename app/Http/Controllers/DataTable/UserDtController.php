<?php

namespace App\Http\Controllers\DataTable;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as dataTables;

class UserDtController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');   
        $this->middleware(['role:administrador','permission:ver usuarios']);
    }

    /**
     * Listado de Usuarios
     *
     * @return void
     * 
     * @get /users-list
     */
    public function index()
    {
        $builder = DB::table('users')->select('users.id', 'users.name', 'users.email', 'users.updated_at', 'roles.name as rname')
        ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
        ->leftJoin('roles', 'model_has_roles.role_id', 'roles.id')
        ->where('users.deleted_at','=', null)
        ->orderBy('users.id', 'DESC');

        return dataTables::of($builder)
        ->addColumn('actions', function ($name) {
            return '
            <a class="" href="usuarios/' . $name->id . '"><i class="fas fa-eye"></i> Ver</a> | 
            <a class="" href="usuarios/' . $name->id . '/edit"><i class="fas fa-edit"></i> Editar</a>';
        })
        ->rawColumns(['actions'])
        ->make();
    }
}
