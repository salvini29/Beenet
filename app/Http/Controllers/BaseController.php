<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Colmena;
use App\Models\User;

class BaseController extends Controller
{
    public function landing()
    {
        return view('index');
    }
    public function searchBarPost(Request $request)
    {
        return redirect()->route('dashboard', $request->codigo_colmena);
    }
    public function dashboard(Request $request)
    {
        return view('dashboard')->with('codigo', $request->codigo);
    }
    public function createColmena(Request $request)
    {
        $logged_user = Auth::user();
        try {
            $logged_user->colmenas()->create(['nombre_colmena' => $request->nombre, 'codigo_colmena' => $request->codigo, 'activa' => $request->activa]);
            return redirect()->route('home')->with('success', 'Se ha creado la colmena!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            //dd($e->getMessage()); PARA OBTENER ERROR
            return redirect()->route('home')->with('failed', 'No se ha podido crear la colmena!');
        }
    }
    public function modifyColmena(Request $request)
    {
        try {
            Colmena::where('id',$request->idConf)->update(['nombre_colmena' => $request->nombreConf, 'activa' => $request->activaConf]);
            return redirect()->route('home')->with('success', 'Se ha modificado la colmena!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            //dd($e->getMessage()); PARA OBTENER ERROR
            return redirect()->route('home')->with('failed', 'No se ha podido modificar la colmena!');
        }
    }
}
