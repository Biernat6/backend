<?php
    namespace App\Http\Controllers;

    use App\Models\Users;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;

    class UserController extends Controller
    {
        //Wybranie jednego użytkownika
        public function find($id)
        {
            $user = Users::findOrFail($id);
            return response()->json($user);
        }

        //Zmiana danych
        public function update(Request $request, $id)
        {
            $user = Users::findOrFail($id);

            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');

            $user->save();
            return response()->json($user);
        }

        //Usuwanie użytkownika
        public function destroy($id)
        {
            $user = Users::destroy($id);
            return response()->json($user);
        }

        //Pobieranie listy użytkowników
        public function index()
        {
            $user = Users::all();
            return response()->json($user);
        }
    }
?>