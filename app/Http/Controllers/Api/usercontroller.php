<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class usercontroller extends Controller
{
    public function index()
    {
        $user= User::getAllUsers();

        if ($user->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No users found'
            ], 404);
        }
        return  response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }
    public function store(Request $request)
    {
           $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:20',
                'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|min:8',
                'phone' => 'required|string|max:15',
           ]);
            if($validator->fails()){
               $data =[
                'mesaje' => 'error en la validacion de datos',
                'data' => $validator->errors(),
                'status' => 400
                ];
                return response()->json($data,200);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
            ]);
            if (!$user) {
                $data = [
                    'mesaje' => 'error al crear el usuario',
                    'status' => 500
                ];
                return response()->json($data, 500);
            }
            $data = [
                'mesaje' => 'usuario creado con exito',
                'data' => $user,
                'status' => 201
            ];
            return response()->json($data, 201);
    }
}
