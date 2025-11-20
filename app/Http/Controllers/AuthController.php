<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }

    public function registerPage(){
        return view('auth.register');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //check in DB
        $user = User::where('email', $request->email)->get();
        if (!$user) {
            return redirect()->back()->with(['error'=> 'user not found']);
        }

        $attempt = Auth::attempt($validated);
        
        if($attempt == false){
            return redirect()->back()->with(['error'=> 'password not correct']);
        }

        return redirect('/admins')->with(['success' => "successfully logged in"]);
    }
//     public function login(Request $request)
// {
//     $validated = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required'
//     ]);

//     // Find user
//     $user = User::where('email', $validated['email'])->first();
//     if (!$user) {
//         return response()->json(['message' => 'User not found'], 404);
//     }

//     // Attempt login
//     if (!Auth::attempt($validated)) {
//         return response()->json(['message' => 'Password not correct'], 401);
//     }

//     // Success
//     return response()->json([
//         'message' => 'Successfully logged in',
//         'user' => Auth::user()
//     ]);
// }


    public function register(Request $request){
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255|email'
        ]);

        if ($request->agree == 'on') {
            $agree = true;
        }else {
            $agree = false;
        }
        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'agreed_to_terms' => $agree,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with(['message' => "success on register"]);
    }
}
