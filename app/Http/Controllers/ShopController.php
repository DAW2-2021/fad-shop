<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Petition;
use App\Models\User;
use App\Models\Category;
use App\Mail\MailSender;

class ShopController extends Controller
{

    public function index($shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $productsCarousel = $shop->products()->orderByDesc('id')->limit(8)->get();
        $products = $shop->products()->orderBy('name')->paginate(9)->fragment('products');
        return view('shop.index', compact('shop', 'productsCarousel', 'products'));
    }

    public function indexAdmin()
    {
        $shops = Shop::orderByDesc('id')->paginate(15);
        return view('shop.admin.index')->with(['shops' => $shops]);
    }

    public function showAdminShop(Shop $shop)
    {
        return view('shop.index')->with(['shop' => $shop]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'petition_id' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return redirect()->route('shop.admin.index')->withErrors($validator);
        }

        $petition = Petition::findOrFail($request->petition_id);
        $user = User::where('id', $petition->user_id)->first();
        $slug = Str::slug($petition->shop_name);
        $dbSlug = Shop::where('slug', $slug)->first();

        if ($dbSlug) {
            return redirect()->route('shop.admin.index')->withErrors(['Coincidence' => 'El nombre de la tienda ya existe.']);
        }

        $shop = Shop::create([
            'slug' => $slug, 'name' => $petition->shop_name, 'description' => $petition->shop_description,
            'logo' => $petition->shop_logo, 'user_id' => $petition->user_id
        ]);

        $details = [
            'title' => 'Tu tienda ha sido creada correctamente',
            'body' => '¡Felicidades! Tu tienda ha sido activada. Ya podrás vender los productos que desees.
            Disfruta y se consciente de lo que haces con tu tienda',
            'view' => 'emails.shop'
        ];
        \Mail::to($user->email)->send(new MailSender($details));

        $petition->status = 'accepted';
        $petition->save();
        $user->role_id = 2;
        $user->save();
        return redirect()->route('petition.admin.index');
    }

    public function showSettings($shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();

        //cambiar if si añadimos que puedan verlo los "empleados" del vendedor
        if ($shop->user_id != Auth::user()->id) {
            return redirect()->route('shop.index', compact('shop'));
        }

        $categories = Category::orderBy('name')->get();
        return view('shop.settings', compact('shop', 'categories'));
    }

    public function update(Request $request, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'shop_name' => ['nullable', 'string', 'min_length:3', 'max_length:255'],
            'shop_description' => ['nullable', 'string', 'min_length:3', 'max_length:255'],
            'shop_logo' => ['nullable', 'file', 'mimes:png,jpg,jpeg', 'max:1024', 'dimensions:width=250,height=70'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('shop.settings', $shop->slug)->withErrors($validator);
        }

        if ($request->filled('shop_name')) {
            $shop->name = $request->shop_name;
        }

        if ($request->filled('shop_description')) {
            $shop->description = $request->shop_description;
        }

        if ($request->file('shop_logo')) {
            unlink(public_path('storage/' . $request->shop_logo));
            $shop->shop_logo = $request->file('logo')->store('logos', 'public');
        }

        $shop->save();
        return redirect()->route('shop.settings', $shop->slug);
    }

    public function destroy(Shop $shop)
    {
        if (Auth::user()->hasRole('admin')) {
            $user = $shop->user()->firstOrFail();
            $user->role_id = 3;
            $user->save();
            $shop->delete();
            return redirect()->route('index');
        }
        return redirect()->route('shop.index');
    }

    public function ban(Request $request, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'reason' => ['required', 'string', 'min_length:20']
        ]);

        if ($validator->fails()) {
            return redirect()->route('shop.index', $shop->slug)->withErrors($validator);
        }


        $shop->update(['reason' => $request->reason, 'blocked_at' =>  date("Y-m-d H:i:s")]);
        $details = [
            'title' => 'Tu tienda ha sido bloqueada',
            'body' => $shop->reason,
            'view' => 'emails.ban'
        ];
        \Mail::to($shop->user->email)->send(new MailSender($details));

        return redirect()->route('shop.index', $shop->slug);
    }

    public function unban(Request $request, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'reason' => ['required', 'string', 'min_length:20']
        ]);

        if ($validator->fails()) {
            return redirect()->route('shop.index', $shop->slug)->withErrors($validator);
        }

        $details = [
            'title' => 'Tu tienda ha sido desbloqueada',
            'body' => 'Enhorabuena tu tienda ha vuelto a reactivarse. Si volvemos a desactivar tu cuenta, quedará desactivada para siempre ',
            'view' => 'emails.unban'
        ];
        \Mail::to($shop->user->email)->send(new MailSender($details));
        $shop->update(['reason' => $request->reason, 'blocked_at' =>  null]);

        return redirect()->route('shop.index', $shop->slug);
    }
}
