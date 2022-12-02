<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
    public function control(Request $request)
    {
        $url = "https://beenet-2cf7b-default-rtdb.firebaseio.com/did/".$request->codigo.".json";
        $response = Http::post($url,[
            'extract' => true,
            'time' => time()
        ]);
        if( $response->status() == 200 ){
            return redirect()->route('home')->with('success', 'Se ha cosechado la colmena!');
        }
        else {
            return redirect()->route('home')->with('failed', 'No se ha podido cosechar la colmena!');
        }
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
    public function deleteColmena(Request $request)
    {
        try {
            return Colmena::where('id',$request->id)->delete();
        }
        catch (\Illuminate\Database\QueryException $e) {
            //dd($e->getMessage()); PARA OBTENER ERROR
            return false;
        }
    }
    public function redirectSuccess(Request $request)
    {
        return redirect()->route('home')->with('success', 'Se ha eliminado la colmena!');
    }
    public function redirectFailed(Request $request)
    {
        return redirect()->route('home')->with('failed', 'No se ha eliminado la colmena!');
    }
}
