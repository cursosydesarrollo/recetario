<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['permission:ver roles'])->only(['index']);
    }

    /**
     * /api/permission
     *
     * @return void
     */
    public function index()
    {
        $pers = Permission::all()->pluck('name', 'id');
        return response()->json($pers, 200);
    }
}
