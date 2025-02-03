<?php

namespace App\Http\Controllers;

use App\Models\Yayasan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->user() !== null && $request->user()->role_id === 1) return redirect()->route('adminHome');

        $yayasan = Yayasan::with([
            'kategoriDonasiYayasan' => function($q) {
                $q->orderBy('yayasan_id', 'ASC')
                    ->orderBy('kategori_donasi_id', 'ASC');
            },
            'kategoriDonasiYayasan.kategoriDonasi'
        ])->take(6)->get();

        return view('home', [
            'yayasan' => $yayasan
        ]);
    }
}
