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
        if (!Auth::user()->petition()) {
            return redirect()->route('index');
        }
        return view('petition.index');
    }

    public function indexAdmin()
    {
        $petitions = Petition::orderByDesc('id')->paginate(15);
        return view('petition.admin.index')->with(['petitions' => $petitions]);
    }

    public function create()
    {
        if (Auth::user()->petition) {
            return redirect()->route('petition.index');
        }
        return view('form.shop');
    }

    public function store(Request $request)
    {
        if (Auth::user()->petition) {
            return redirect()->route('petition.index');
        }
        $validator = Validator::make($request->all(), [
            'shop_name' => ['required', 'unique:petitions', 'string', 'min:3', 'max:255'],
            'shop_description' => ['required', 'string', 'min:3', 'max:255'],
            'shop_logo' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:1024', 'dimensions:width=250,height=70'],
            'dni_front' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:2048'],
            'dni_back' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        if ($validator->fails()) {
            return redirect()->route('petition.create')->withErrors($validator);
        }

        $pathDniFront = $request->file('dni_front')->store('dnis_fronts', 'public');
        $pathDniBack = $request->file('dni_back')->store('dnis_back', 'public');
        $pathLogo = $request->file('shop_logo')->store('logos', 'public');

        $data = array_merge(request(['shop_name', 'shop_description']), ['shop_logo' => $pathLogo, 'dni_back' => $pathDniBack, 'dni_front' => $pathDniFront]);
        $petition = Auth::user()->petition()->create($data);

        return redirect()->route('petition.index');
    }

    public function showAdminPetition(Petition $petition)
    {
        return view('petition.admin.show')->with(['petition' => $petition]);
    }

    //user
    public function show(Petition $petition)
    {

        if (Auth::user()->id == $petition->user_id) {
            return view('petition.show');
        }
        return redirect()->route('index');
    }

    /* public function acceptPetition(Petition $petition)
    {
        $petition->status = "accepted";
        $petition->save();

        return redirect()->route('petition.admin.show', $petition->id);
    } */

    public function pendingPetition(Petition $petition)
    {
        $petition->status = "pending";
        $petition->save();
        return redirect()->route('petition.admin.show', $petition->id);
    }

    public function rejectPetition(Petition $petition)
    {
        $petition->status = "rejected";
        $petition->save();
        return redirect()->route('petition.admin.show', $petition->id);
    }

    public function update(Request $request, Petition $petition)
    {

        if ($petition->status != 'pending') {
            return redirect()->route('petition.admin.show', $petition->id);
        }

        $validator = Validator::make($request->all(), [
            'shop_name' => ['nullable', 'unique:petitions', 'string', 'min:3', 'max:255'],
            'shop_description' => ['nullable', 'string', 'min:3', 'max:255'],
            'shop_logo' => ['nullable', 'file', 'mimes:png,jpg,jpeg', 'max:1024', 'dimensions:width=250,height=70'],
            'status' => ['nullable', 'string', 'min:3', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('petition.admin.update', $petition->id)->withErrors($validator);
        }

        if ($request->file('shop_logo')) {
            unlink(public_path('storage/' . $request->shop_logo));
            $petition->shop_logo = $request->file('logo')->store('logos', 'public');
        }

        if ($request->filled('shop_name')) {
            $petition->shop_name = $request->shop_name;
        }

        if ($request->filled('shop_description')) {
            $petition->shop_description = $request->shop_description;
        }

        if ($request->filled('status')) {
            $petition->status = $request->status;
        }

        $petition->save();
        return redirect()->route('petition.admin.show', $petition->id);
    }
}
