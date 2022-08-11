<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BaseController extends Controller
{
    public function landing()
    {
        return view('index');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function createColmena(Request $request)
    {
        $logged_user = Auth::user();
        //return redirect()->route('home')->with('failed', 'El usuario ya tenia mail UCA');
        try {
            $logged_user->colmenas()->create(['nombre_colmena' => $request->nombre, 'codigo_colmena' => $request->codigo, 'activa' => $request->activa]);
            return redirect()->route('home')->with('success', 'Se ha creado la colmena!');
        }
        catch (\Illuminate\Database\QueryException $e) {
            //dd($e->getMessage()); PARA OBTENER ERROR
            return redirect()->route('home')->with('failed', 'No se ha podido crear la colmena!');
        }
    }
    public function testxd(Request $request)
    {
        $user = Auth::user();
        return redirect()->route('home')->with('failed', 'El usuario ya tenia mail UCA');
        dd( $user->colmenas()->create(['nombre_colmena' => 'asd', 'codigo_colmena' => 'asd2', 'activa' => true]) );
    }
}
