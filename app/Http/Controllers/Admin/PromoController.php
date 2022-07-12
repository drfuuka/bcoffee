<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Promo;

use App\Http\Controllers\Controller;

class PromoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if(request()->ajax()){
            $query = Promo::query();

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="dropdown table-btn-group">
                    <a class="text-muted dropdown-toggle font-size-16" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end p-0 overflow-hidden rounded">
                        <a class="dropdown-item" href="' .route('admin.promo.edit', $item->id). '">
                            Sunting
                        </a>
                        <form action="'. route('admin.promo.destroy', $item->id).'" method="POST">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button class="rounded-0 dropdown-item btn text-danger" type="submit">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                ';
            })
            ->editColumn('tampilkan', function($item){
                if($item->tampilkan == 1) {
                    return 'Ya';
                } else {
                    return 'Tidak';
                }
            })
            ->editColumn('foto', function($item){
                return $item->foto ?
                '<a href="'.Storage::url($item->foto).'" target="_blank">
                    <img src="' . Storage::url($item->foto) . '" style="height: 40px; width: 40px; object-fit: cover; object-position: center" class="rounded"/>
                </a>'
                : 
                '';
            })
            ->rawColumns(['action', 'foto'])
            ->make()
            ;
        }
        return view('admin.promo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_promo' => 'required',
            'keterangan'  => 'required',
            'foto'        => 'required|mimes:jpeg,bmp,png|max:8000',
            'tampilkan'   => 'required',
        ]);

        $data               = new Promo;
        
        $data->judul_promo = $request->judul_promo;
        $data->keterangan  = $request->keterangan;
        $data->tampilkan   = $request->tampilkan;
        $data['foto']      = $request->file('foto')->store('images/promo', 'public');
        $data->save();

        return redirect()->route('admin.promo.index')->with('success',new HtmlString('Promo <b>'. $request->judul_promo .'</b> berhasil ditambahkan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('admin.promo.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_promo' => 'required',
            'keterangan'  => 'required',
            'tampilkan'   => 'required',
        ]);

        $data              = Promo::find($id);

        $data->judul_promo = $request->judul_promo;
        $data->keterangan  = $request->keterangan;
        $data->tampilkan   = $request->tampilkan;
        
        if(!empty($request->foto)){
            $data->foto =  $request->file('foto')->store('images/promo', 'public');
        }

        $data->update();

        return redirect()->route('admin.promo.index')->with('success','Promo berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();
        Storage::disk('public')->delete($promo->foto);

        return redirect()->route('admin.promo.index')->with('success',new HtmlString('Promo <b>' . $promo->judul_promo . '</b> berhasil di hapus!'));
    }
}
