<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailMateri;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DOMDocument;
use DB;

class DetailMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $detail_materi = DB::table('detail_materi')
            ->join('materi', 'detail_materi.materi_id', '=', 'materi.id')
            ->select('detail_materi.*', 'materi.judul as judul_materi')
            ->get();
        return view('admin.detail_materi.index', compact('detail_materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materi = DB::table('materi')->get();
        $detail_materi = DB::table('detail_materi')
            ->join('materi', 'detail_materi.materi_id', '=', 'materi.id')
            ->select('detail_materi.*', 'materi.judul as judul_materi')
            ->get();

        return view('admin.detail_materi.create', compact('detail_materi', 'materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'materi_id'    => 'required',
            'sub_judul'    => 'required',
            'isi_materi'   => 'required',
        ], 
        [
            'materi.required'        => 'Judul materi wajib diisi',
            'sub_judul.required'     => 'Sub judul wajib diisi',
            'isi_materi.required'    => 'Isi materi wajib diisi',
        ]);

        $isi_materi = $request->isi_materi;
 
        $dom = new DOMDocument();
        $dom->loadHTML($isi_materi,9);
 
        $images = $dom->getElementsByTagName('img');
 
        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/admin/img" . time(). $key.'.png';
            file_put_contents(public_path().$image_name,$data);
 
            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }
        $isi_materi = $dom->saveHTML();
 
        DetailMateri::create([
            'materi_id'     => $request->materi_id,
            'sub_judul'     => $request->sub_judul,
            'isi_materi'    => $isi_materi, 
        ]);
 
        Alert::success('Detail materi', 'Berhasil menambahkan detail materi');
        return redirect('detail_materi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $materi = DB::table('materi')->get();
        $detail_materi = DB::table('detail_materi')->where('id', $id)->get();

        return view('admin.detail_materi.detail', compact('detail_materi', 'materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $materi = DB::table('materi')->get();
        $detail_materi = DB::table('detail_materi')->where('id', $id)->get();

        return view('admin.detail_materi.edit', compact('detail_materi', 'materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $detail_materi = DetailMateri::find($id);
 
        $isi_materi = $request->isi_materi;
 
        $dom = new DOMDocument();
        $dom->loadHTML($isi_materi,9);
 
        $images = $dom->getElementsByTagName('img');
 
        foreach ($images as $key => $img) {
 
            // Check if the image is a new one
            if (strpos($img->getAttribute('src'),'data:image/') ===0) {
               
                $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
                $image_name = "/admin/img" . time(). $key.'.png';
                file_put_contents(public_path().$image_name,$data);
                 
                $img->removeAttribute('src');
                $img->setAttribute('src',$image_name);
            }
 
        }
        $isi_materi = $dom->saveHTML();
 
        $detail_materi->update([
            'materi_id'    => $request->materi_id,
            'sub_judul'    => $request->sub_judul,
            'isi_materi'   => $isi_materi,
        ]);
 
        Alert::info('Detail materi', 'Berhasil mengedit detail materi');
        return redirect('detail_materi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('detail_materi')->where('id', $id)->delete();

        return redirect('detail_materi');
    }
}