<?php

namespace App\Http\Controllers;

use App\User;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class RecetaController extends Controller
{
    /**
     * funcion __contruct
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('verified')->except(['index', 'show']);
        $this->authorizeResource(Receta::class, 'receta');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *  /recentas/
     */
    public function index()
    {
        $items = Receta::orderBy('id', 'DESC')->published()->paginate(5);
        return view('recetas.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * /recentas/create
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
     * 
     * @post /recentas/
     */
    public function store(Request $request)
    {
        // Metodo Gordo
        
        $request->validate([
            'nombre' => 'required|string|unique:recetas',
            'descripcion' => 'required|string',
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
        $request['published'] = 1;
        $request['user_id'] = Auth::user()->id;  
        $receta = Receta::create($request->all());

        return redirect()->to('/recetas')->with('success','Receta Creada!');
    }

    /**
     * @get /recetas/{receta}
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //return $receta;
        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @get /recetas/{receta}/edit
     * 
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {

        return view('recetas.edit', compact('receta'));
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
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048|nullable'
        ]);
        
        if($request->has('imagen')){
            $file = $request->file('imagen');
            $fileName = 'receta-'.time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('recetas', $fileName);
            // ln -s /var/www/storage/app /var/www/public/storage
            $dbPath = Storage::url($path);
            $request['imagen_url'] = $dbPath;
        }

        $receta->update($request->all());
        return redirect()->to('/recetas/' . $receta->id)->with('success','Receta Editada!');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        if($receta->delete()){
            return redirect()->to('/recetas')->with('success','Receta eliminada!');
        }
    }
}
