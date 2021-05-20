<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        return view("user.index");
    }

    public function update(Request $request, User $user = null)
    {
        if ($user == null) {
            $user = Auth::user();
        }
        if ($user->id == Auth::user()->id || Auth::user()->hasRole('admin')) {
            $validator = Validator::make($request->all(), [
                'username' => ['nullable', 'string', 'min:3', 'max:255'],
                'email' => ['nullable', 'email'],
                'password' => ['nullable', 'confirmed', 'string', 'min:3', 'max:255'],
                'phone' => ['nullable', 'numeric', 'digits:9']
            ]);

            if ($validator->fails()) {
                return redirect()->route('user.index')->withErrors($validator);
            }

            if ($request->filled('username')) {
                $user->username = $request->username;
            }


            if ($request->filled('email')) {
                $user->google_id = null;
                $user->email = $request->email;
            }

            if ($request->filled('password')) {
                $user->password =  Hash::make($request->password);
            }

            if ($request->filled('phone')) {
                $user->phone =  $request->phone;
            }
            $user->save();
            return redirect()->route("user.index", ['success' => "true"]);
        }
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        if ($user->id == Auth::user()->id) {
            $user->delete();
            return redirect()->route('index');
        }
        return redirect()->route('user.index');
    }
}
