<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Petition;

class PetitionController extends Controller
{

    public function index()
    {
        return view('petition.admin.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shop_name' => ['required', 'unique:petitions', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:3', 'max:255'],
            'logo' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:1024'],
            'dni_front' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:2048'],
            'dni_back' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        if ($validator->fails()) {
            return redirect()->route('petition.index')->withErrors($validator);
        }

        $pathDniFront = $request->file('dni_front')->store('dnis_fronts', 'public');
        $pathDniBack = $request->file('dni_back')->store('dnis_back', 'public');
        $pathLogo = $request->file('logo')->store('logos', 'public');

        $data = array_merge(request(['shop_name', 'description']), ['logo' => $pathLogo, 'dni_back' => $pathDniBack, 'dni_front' => $pathDniFront]);
        $petition = Auth::user()->petition()->create($data);

        return redirect()->route('petition.show', $petition->id);
    }

    public function showAdminPetition(Petition $petition)
    {
        return view('petition.admin.show');
    }

    //user
    public function show(Petition $petition)
    {
        if (Auth::user()->id == $petition->user_id) {
            return view('petition.show');
        }
        return redirect()->route('index');
    }

    public function update(Request $request, Petition $petition)
    {
        $validator = Validator::make($request->all(), [
            'shop_name' => ['required', 'unique:petitions', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:3', 'max:255'],
            'logo' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('petition.admin.show', $petition->id)->withErrors($validator);
        }

        if ($request->file('logo')) {
            unlink(public_path('storage/' . $request->logo));
            $petition->logo = $request->file('logo')->store('logos', 'public');
        }

        if ($request->filled('shop_name')) {
            $petition->shop_name = $request->shop_name;
        }


        if ($request->filled('description')) {
            $petition->description = $request->description;
        }
        $petition->save();
        return redirect()->route('petition.admin.show', $petition->id);
    }
}
