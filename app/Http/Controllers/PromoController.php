<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Promo;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['promo'] = Promo::where('tampilkan', 1)->get();
        return view('promo', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
