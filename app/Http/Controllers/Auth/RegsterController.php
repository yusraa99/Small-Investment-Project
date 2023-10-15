<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegistrationRequest;


class RegsterController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        $newuser = $request->validated();

        $newuser['password'] = Hash::make($newuser['password']);
        $newuser['role'] = 'user';
        $newuser['status'] = 'active';

        $user=User::create($newuser);

        $success['token']=$user->createToken('user',['app:all'])->plainTextToken;
        $success['name']=$user->first_name;
        $success['success']=true;

        return response()->json($success, 200);
    }
}
