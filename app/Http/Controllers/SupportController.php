<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class SupportController extends Controller
{

    public function index()
    {
        return view('form.support');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => ['required', 'string', 'min:3', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()->route('support.index')->withErrors($validator);
        }

        Auth::user()->supports()->create([
            'title' => $request->title, 'content' => $request->content
        ]);

        return redirect()->route('index');
    }

    public function show(Support $support)
    {
        return view('support.show', compact('support'));
    }

    public function indexAdmin()
    {
        $supports = Support::orderByDesc('id')->paginate(15);
        return view('support.index', compact('supports'));
    }

    public function closeSupport(Support $support)
    {
        $support->status = "closed";
        $support->save();
        return redirect()->route('support.admin.show', $support->id);
    }
}
