<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Yajra\DataTables\Facades\DataTables;

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

                $data = Produk::where('populer', 1)->get();
                if($item->populer == 2) {
                    if(count($data) < 3) {
                        $populerButton = '
                            <button class="rounded-0 dropdown-item btn text-success" type="button" onclick="getDataPopuler(`'. $item->nama_produk .'`,`'.$item->id.'`)" data-bs-toggle="modal" data-bs-target="#populer-modal">
                                Jadikan Populer
                            </button>
                        ';
                    } else {
                        $populerButton = null;
                    }
                } else {
                    $populerButton = '
                        <form action="'. route('admin.produk.destroy-populer', $item->id).'" method="POST">
                            '.csrf_field().'
                            '.method_field('PUT').'
                            <button class="rounded-0 dropdown-item btn text-warning" type="submit">
                                Hapus Populer
                            </button>
                        </form>
                    ';
                }

                return '
                <div class="dropdown table-btn-group">
                    <a class="text-muted dropdown-toggle font-size-16" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end p-0 overflow-hidden rounded">
                        <a class="dropdown-item" href="' .route('admin.produk.edit', $item->id). '">
                            Sunting
                        </a>'
                        . $populerButton .
                        '<form action="'. route('admin.produk.destroy', $item->id).'" method="POST">
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
            ->editColumn('nama_produk', function($item){
                return $item->populer == 1 ?
                    $item->nama_produk . ' <span class="badge bg-primary">Populer ' . $item->populer_order . '</span>'
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
                '<b class="text-primary">Rp.'.$item->harga.'</b>'
                : 
                '';
            })
            ->editColumn('tampilkan', function($item){
                if($item->tampilkan == 1) {
                    $showVal = 'checked="true"';
                } else {
                    $showVal = "";
                }
                return '<form action="'.route("admin.produk.update", $item->id).'" id="update-'.$item->id.'" method="POST">
                            '.csrf_field().'
                            '.method_field('PUT').'
                            <div class="form-check form-switch mb-3">
                                <input name="nama_produk" type="hidden" value="'.$item->nama_produk.'">
                                <input name="harga" type="hidden" value="'.$item->harga.'">
                                <input name="jenis" type="hidden" value="'.$item->jenis.'">
                                <input class="form-check-input" type="checkbox" id="toggle-show-'.$item->id.'" onchange="toggleShow('.$item->id.')" '.$showVal.'>
                                <input name="tampilkan" id="tampilkan-'.$item->id.'" type="hidden" value="'.$item->tampilkan.'">
                                <button type="submit" id="button" class="d-none"></button>
                            </div>
                        </form>';
            })
            ->rawColumns(['action', 'foto', 'nama_produk', 'harga', 'tampilkan'])
            ->make()
            ;
        }

        $data = Produk::where('populer', 1)->get();
        $order = [1,2,3];
        if(count($data) > 0) {
            foreach ($data as $item) {
                $populerOrder[] = $item['populer_order'];
            }
            $order = array_diff($order, $populerOrder);
        }
        $data['availableOrder'] = $order;
        return view('admin.produk.index', $data);
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
            'nama_produk' => 'required',
            'harga'       => 'required',
            'jenis'       => 'required',
            'foto'        => 'required',
            'tampilkan'   => 'required',
        ]);

        $data               = new Produk;
        
        $data->populer     = 2;
        $data->nama_produk = $request->nama_produk;
        $data->harga       = $request->harga;
        $data->jenis       = $request->jenis;
        $data->tampilkan   = $request->tampilkan;
        $data['foto']      = $request->file('foto')->store('images/produk', 'public');
        $data->save();

        return redirect()->route('admin.produk.index')->with('success',new HtmlString('Produk <b>'. $request->nama_produk .'</b> berhasil ditambahkan'));
    }

    public function createPopuler(Request $request)
    {
        $id = $request->id_parameter;

        $request->validate([
            'populer_order'         => 'required|unique:produks',
        ],
        [
            'populer_order.required' => 'The order you selected has been used!'
        ]);

        $data               = Produk::find($id);
        
        $data->populer       = 1;
        $data->populer_order = $request->populer_order;
        $data->update();

        return redirect()->route('admin.produk.index')->with('success',new HtmlString('Produk <b>'. $data->nama_produk .'</b> berhasil dijadikan populer dengan urutan <b>' .$request->populer_order. '</b>'));
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
            'tampilkan'         => 'required',
        ]);

        $data              = Produk::find($id);

        $data->nama_produk = $request->nama_produk;
        $data->harga       = $request->harga;
        $data->jenis       = $request->jenis;
        $data->tampilkan   = $request->tampilkan;
        
        if(!empty($request->populer)){
            $data->populer       = $request->populer;
            $data->populer_order = $request->populer_order;
        }
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
        Storage::disk('public')->delete($produk->foto);

        return redirect()->route('admin.produk.index')->with('success',new HtmlString('Produk ' . $produk->nama_produk . ' berhasil di hapus!'));
    }

    public function destroyPopuler($id)
    {
        $data               = Produk::find($id);
        
        $data->populer       = 2;
        $data->populer_order = '';
        $data->update();

        return redirect()->route('admin.produk.index')->with('success',new HtmlString('Produk <b>'. $data->nama_produk .'</b> berhasil dihapus dari populer'));
    }
}
