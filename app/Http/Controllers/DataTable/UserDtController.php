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

    public function index()
    {
        $builder = User::query()->select('id', 'name', 'email', 'updated_at');

        return dataTables::of($builder)->make(true);
    }
}
