<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view("user.index");
    }

    public function update(Request $request, User $user)
    {
        if ($user->id == Auth::user()->id) {
            $validator = Validator::make($request->all(), [
                'username' => ['nullable', 'string', 'min:3', 'max:255'],
                'email' => ['nullable', 'email'],
                'password' => ['nullable', 'confirmed', 'string', 'min:3', 'max:255'],
                'phone' => ['nullable', 'integer', 'min:9', 'max:9']
            ]);
            if ($validator->fails()) {
                return redirect()->route('user.index')->withErrors($validator);
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone
            ]);
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
