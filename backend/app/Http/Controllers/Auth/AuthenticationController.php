<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponse;

class AuthenticationController extends Controller
{
    use ApiResponse;
    public function register(Request $request)
    {
        $createNewUser = new CreateNewUser();
        return $createNewUser->create($request->all());
    }


    public function login(Request $request)
    {

        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $user = User::where('email', $request->email)->first();

        if (
            $user &&
            Hash::check($request->password, $user->password)
        ) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['access_token' => $token]);
        }
    }
}
