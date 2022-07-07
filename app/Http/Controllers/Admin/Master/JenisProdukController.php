<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Master\MsJenisProduk;

use App\Http\Controllers\Controller;

class JenisProdukController extends Controller
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
            $query = MsJenisProduk::query();

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="dropdown table-btn-group">
                    <a class="text-muted dropdown-toggle font-size-16" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="' .route('admin.master.jenis-produk.edit', $item->id). '">
                            Sunting
                        </a>
                        <form action="'. route('admin.master.jenis-produk.destroy', $item->id).'" method="POST">
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
            ->editColumn('tampilkan', function($item){
                if($item->tampilkan == 1) {
                    return 'Ya';
                } else {
                    return 'Tidak';
                }
            })
            ->make()
            ;
        }
        return view('admin.master.jenis_produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.jenis_produk.create');
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
            'jenis'     => 'required',
            'tampilkan' => 'required',
        ]);

        $data               = new MsJenisProduk();

        $data->jenis     = $request->jenis;
        $data->tampilkan = $request->tampilkan;
        $data->save();

        return redirect()->route('admin.master.jenis-produk.index')->with('success','Jenis produk '. $request->jenis .' berhasil ditambahkan!');
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
    public function edit(MsJenisProduk $jenisProduk)
    {
        return view('admin.master.jenis_produk.edit',compact('jenisProduk'));
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
            'jenis'     => 'required',
            'tampilkan' => 'required',
        ]);

        $data            = MsJenisProduk::find($id);
        $data->jenis     = $request->jenis;
        $data->tampilkan = $request->tampilkan;
        
        $data->update();

        if($data->tampilkan == 1) {
            $isDisplay = "ditampilkan";
        } else {
            $isDisplay = "tidak ditampikan";
        }
        return redirect()->route('admin.master.jenis-produk.index')->with('success','Produk berhasil diubah ke ' .$request->jenis. ' dan ' .$isDisplay);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(MsJenisProduk $jenisProduk)
    {   
        $jenisProduk->delete();
        return redirect()->route('admin.master.jenis-produk.index')->with('success','Jenis produk ' . $jenisProduk->jenis . ' berhasil di hapus!');
    }
}
