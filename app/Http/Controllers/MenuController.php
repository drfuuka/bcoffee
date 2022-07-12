<?php

namespace App\Http\Controllers;

use App\Models\Master\MsJenisProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Produk;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = Produk::all();
        $data['jenis'] = MsJenisProduk::distinct()->where('tampilkan', 1)->get();
        return view('menu', $data);
    }

    public function filterMenu(Request $request) 
    {
        $val = $request->jenis;

        if($val == 'all') {
            $data = Produk::all();
        } else {
            $data = Produk::where('jenis', $val)->get();
        }

        $html = "";
        if(count($data) > 0) {
            foreach ($data as $item) {
                $html .= '<div class="col-md-3 mt-5">
                    <div class="img-container rounded">
                        <img src="'.Storage::url($item['foto']).'" alt="" class="img-fluid">
                    </div>
                    <div class="text-center">
                        <h4 class="fw-bold">'.$item['nama_produk'].'</h4>
                    </div>
                </div>';
            }
        } else {
            $html = "<span class='text-center'>Menu belum ada :(</span>";
        }
        
        return $html;
    }
    
}
