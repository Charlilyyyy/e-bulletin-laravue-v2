<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\{
    LoginRequest,
};

use App\Models\{
    User,
    // Per
};

class AuthController extends Controller
{
    public function login(LoginRequest $request,User $user)
    {
        $request->validated();

        $cred = $request->only('email','password');
        if(Auth::attempt($cred)){
                $token = $user->user($request->email)->createToken('eBulletin')->plainTextToken;
                $user->user($request->email)->update([
                    // 'email_verified_at' => now(),
                    'last_login_at' => now()
                ]);
                return response()->json([
                    'user' => $user->user($request->email),
                    'token' => $token,
                    'message' => 'Login succcessfully'
                ],200);
        }else{
            return response()->json(['error' => 'Password mismatch' , 'message' => 'Wrong password please try again'],422);
        }

    }

    public function logout(Request $request,User $user)
    {

        // return $request;
        // $user->user($request->email)->token($request->id)->delete();

        // $request->token($request->id)->delete();
        DB::table('personal_access_tokens')->where('tokenable_id',$request->id)->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
