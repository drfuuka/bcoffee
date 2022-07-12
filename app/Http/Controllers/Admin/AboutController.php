<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\HtmlString;

class AboutController extends Controller
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
        $data['about'] = About::get();
        return view('admin.about.index', $data);
    }

    public function store(Request $request)
    {
        About::query()->truncate();
        $input = $request->all();
        About::create($input);
        return redirect()->route('admin.about.index')->with('success',new HtmlString('Data tentang saya berhasil di ubah!'));
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            // delete all file before store
            // $file = new Filesystem;
            // $file->cleanDirectory('storage/images/about');

            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //Upload File
            $request->file('upload')->storeAs('public/images/about', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/images/about/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            return response()->json(['uploaded' => true, 'url' => $url, ]);
        }
    }

}