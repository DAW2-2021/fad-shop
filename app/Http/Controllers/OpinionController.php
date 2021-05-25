<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Opinion;
use Illuminate\Support\Facades\Validator;

class OpinionController extends Controller
{
    public function store(Request $request)
    {
        //user
        $validator = Validator::make($request->all(), [
            'score' => ['required', 'integer', 'min:0', 'max:10'],
            'comment' => ['nullable', 'string', 'min:3', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('opinion.store')->withErrors($validator);
        }

        Opinion::create($request);

        return redirect()->route('product.index', $request->product_id);
    }

    public function update(Request $request, $opinion)
    {
        $opinion = Opinion::where('id', $opinion)->firstOrFail();
        //user
        if (Auth::user()->id == $opinion->user_id) {
            $validator = Validator::make($request->all(), [
                'score' => ['nullable', 'integer', 'min:0', 'max:10'],
                'comment' => ['nullable', 'string', 'min:3', 'max:255'],
            ]);
            if ($validator->fails()) {
                return redirect()->route('opinion.update', $opinion->id)->withErrors($validator);
            }
            $opinion->update($request->all());
            return redirect()->route('opinion.update', $opinion->id);
        }
    }

    public function destroy(Opinion $opinion)
    {
        //user | admin
        if (Auth::user()->id == $opinion->user_id || Auth::user()->role_id == 1) {
            $opinion->delete();
            return redirect()->route('product.show', $opinion->product_id);
        }
        return redirect()->route('product.show', $opinion->product_id)->withErrors('No tienes permisos para borrar la opinion.');
    }
}
