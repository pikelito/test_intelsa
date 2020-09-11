<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Authrequest;


class AuthController extends Controller
{
    public function login(Authrequest $request)
    {
        //Datos validados
        $data=$request->validated();

        //Verificar datos de autenticación
        $credentials = ['email'=> $data['email'], 'password'=> $data['password']];
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'error' => true,
                'message' => 'Datos erróneos'
            ], 401);
        }

        //Crear el token
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();

        return response()->json([
            'user' => $user,
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['success' => true, 'message' => 'Sesión cerrada con éxito.']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
