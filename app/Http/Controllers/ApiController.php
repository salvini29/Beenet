<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Colmena;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function loginUser(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if( Hash::check($request->password, $user->password) )
        {
            return response()->json(true);
        }
        else
        {
            return response()->json(false);
        }
    }
    public function registerUser(Request $request)
    {
        //VerifyCsrfToken -> poner la ruta de este controller a excluir
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
    public function getColmenasUser(Request $request)
    {
        //VerifyCsrfToken -> poner la ruta de este controller a excluir
        $user = User::where('email',$request->email)->first();
        //return $user
        if( empty($user) )
        {
            return response()->json("No existe un usuario con ese mail!");
        }
        return response()->json($user->colmenas()->get());
    }
    public function createColmenaApi(Request $request)
    {
        $mobile_user = User::where('email',$request->mail_usuario)->first();
        try {
            $mobile_user->colmenas()->create(['nombre_colmena' => $request->nombre, 'codigo_colmena' => $request->codigo, 'activa' => $request->activa]);
            return response()->json(true);
        }
        catch (\Illuminate\Database\QueryException $e) {
            //dd($e->getMessage()); PARA OBTENER ERROR
            return response()->json(false);
        }
    }
}
