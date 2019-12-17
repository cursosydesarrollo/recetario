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
        $builder = User::query()->select('id', 'name', 'email', 'updated_at')
            ->where('deleted_at', '!=' ,null);

        return dataTables::of($builder)
        ->addColumn('actions', function ($name) {
            return '
            <a class="" href="usuarios/' . $name->id . '"><i class="fas fa-eye"></i> Ver</a> | 
            <a class="" href="usuarios/' . $name->id . '/edit"><i class="fas fa-edit"></i> Editar</a>
            ';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
}
