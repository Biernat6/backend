<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Rejestracja użytkownika
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:64',
            'lastname' => 'required|string|max:64',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return response()->json($user, 201);
    }

    // Logowanie użytkownika
  public function login(Request $request)
  {
      $credentials = $request->validate([
          'email' => 'required|email',
          'password' => 'required'
      ]);
  
      if (Auth::attempt($credentials)) {
          $request->session()->regenerate();
  
          return response()->json(['message' => 'Zalogowano poprawnie']);
      }
  
      return response()->json(['error' => 'Błędny login lub hasło'], 401);
  }
  

    // Wylogowanie użytkownika
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Wylogowano']);
    }

    // Zmiana hasła
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = Auth::user();

        if (!Hash::check($request->input('old_password'), $user->password)) {
            return response()->json(['message' => 'Nie prawidłowe stare hasło'], 401);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return response()->json(['message' => 'Poprawna zmiana hasła']);
    }
}
