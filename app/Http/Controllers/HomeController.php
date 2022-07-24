<?php

namespace App\Http\Controllers;
use App\Models\Pekerja;
use App\Models\Kopi;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pekerja = Pekerja::count();
        $kopi = Kopi::count();
        $scale = Kopi::sum('berat');
        return view('home', compact('pekerja', 'kopi', 'scale'));
    }

}
