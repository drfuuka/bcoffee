<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

use App\Models\Produk;
use App\Models\Master\MsJenisProduk;

use App\Http\Controllers\Controller;

class ProdukController extends Controller
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
            $query = Produk::query();

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="dropdown table-btn-group">
                    <a class="text-muted dropdown-toggle font-size-16" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="' .route('admin.produk.edit', $item->id). '">
                            Sunting
                        </a>
                        <form action="'. route('admin.produk.destroy', $item->id).'" method="POST">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button class="dropdown-item text-danger" type="submit">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                ';
            })
            ->editColumn('nama_produk', function($item){
                return $item->populer == 1 ?
                    $item->nama_produk . ' <span class="badge bg-secondary">Populer ' . $item->populer_order . '</span>'
                    :
                    $item->nama_produk
                ;
            })
            ->editColumn('foto', function($item){
                return $item->foto ?
                '<a href="'.Storage::url($item->foto).'" target="_blank">
                    <img src="' . Storage::url($item->foto) . '" style="height: 40px; width: 40px; object-fit: cover; object-position: center" class="rounded"/>
                </a>'
                : 
                '';
            })
            ->editColumn('harga', function($item){
                return $item->harga ?
                'Rp.'.$item->harga
                : 
                '';
            })
            ->rawColumns(['action', 'foto', 'nama_produk'])
            ->make()
            ;
        }
        return view('admin.produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['jenisProduk'] = MsJenisProduk::where('tampilkan', 1)->get();
        $data['produk']      = Produk::all();

        return view('admin.produk.create', $data);
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
            'nama_produk'   => 'required',
            'harga'         => 'required',
            'jenis'         => 'required',
            'foto'          => 'required',
            'populer'       => 'required',
            'populer_order' => 'required_if:populer,==,1|unique:produks',
        ],
        [
            'populer_order.unique' => 'Sequence that you choose already used!',
            'populer_order.required_if' => 'This field is required when you make this Popular!'
        ]);

        $data               = new Produk;
        
        $data->nama_produk   = $request->nama_produk;
        $data->harga         = $request->harga;
        $data->jenis         = $request->jenis;
        $data->foto          = $request->foto;
        $data->populer       = $request->populer;
        $data->populer_order = $request->populer_order;
        $data['foto']        = $request->file('foto')->store('images/produk', 'public');
        $data->save();

        return redirect()->route('admin.produk.index')->with('success','Produk '. $request->nama_produk .' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $jenisProduk = MsJenisProduk::where('tampilkan', 1)->get();
        return view('admin.produk.edit', compact('produk', 'jenisProduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk'   => 'required',
            'harga'         => 'required',
            'jenis'         => 'required',
            'populer'       => 'required',
            'populer_order' => 'required_if:populer,==,1|unique:produks',
        ],
        [
            'populer_order.unique' => 'Sequence that you choose already used!',
            'populer_order.required_if' => 'This field is required when you make this Popular!'
        ]);

        $data              = Produk::find($id);

        $data->nama_produk   = $request->nama_produk;
        $data->harga         = $request->harga;
        $data->jenis         = $request->jenis;
        $data->populer       = $request->populer;
        $data->populer_order = $request->populer_order;
        
        if(!empty($request->foto)){
            $data->foto =  $request->file('foto')->store('images/produk', 'public');
        }

        $data->update();

        return redirect()->route('admin.produk.index')->with('success','Produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Produk $produk)
    {   
        $produk->delete();
        return redirect()->route('admin.produk.index')->with('success','Produk ' . $produk->nama_produk . ' berhasil di hapus!');
    }
}
