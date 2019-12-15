<?php

namespace App\Http\Controllers;

use App\Receta;
use App\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *  /recentas/
     */
    public function index()
    {
        $items = Receta::orderBy('id', 'DESC')->paginate(5);
        return view('recetas.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:recetas',
            'descripcion' => 'required|max:300|string',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        if($request->has('imagen')){
            $file = $request->file('imagen');
            $fileName = 'receta-'.time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('recetas', $fileName);
            //Storage::disk('local')->put($file, 'Contents');
            // ln -s /home/public_html/storage/app/public /home/dev5/public_html/public/storage
            $dbPath = Storage::url($path);
        }

        $request['imagen_url'] = $dbPath;
        $request['user_id'] = 1;  
        $receta = Receta::create($request->all());

        return redirect()->to('/recetas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
