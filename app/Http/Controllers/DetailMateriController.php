<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailMateri;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
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

        return view('admin.detail_materi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'materi_id'     => 'required',
            'sub_judul'     => 'required',
            'isi_materi'    => 'required',
        ], 
        [
            'materi.required'        => 'Judul materi wajib diisi',
            'sub_judul.required'     => 'Sub judul wajib diisi',
            'isi_materi.required'    => 'Isi materi diskusi wajib diisi',
        ]);

        // Proses pengelolaan gambar
        $isi_materi = $request->isi_materi;

        $dom = new DOMDocument();
        $dom->loadHTML($isi_materi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_extension = explode('/', explode(';', $img->getAttribute('src'))[0])[1]; // Mendapatkan ekstensi gambar dari tipe MIME
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'svg']; // Ekstensi yang diizinkan

            if (in_array($image_extension, $allowed_extensions)) {
                $image_name = "/upload/" . time() . $key . '.' . $image_extension;
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }

        $isi_materi = $dom->saveHTML();

        DB::table('detail_materi')->insert([
            'materi_id'          => $request->materi_id,
            'sub_materi'     => $request->sub_materi,
            'isi_materi'         => $isi_materi, 
        ]);
    
        Alert::success('Detail materi', 'Berhasil menambahkan detail materi');
        return redirect('admin/detail_materi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $materi = DB::table('materi')->get();
        $detail_materi = DB::table('detail_materi')->where('id', $id)->get();

        return view('admin.detail_materi.edit', compact('detail_materi', 'materi'));
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
    public function update(Request $request)
    {
        //
        $request->validate([
            'materi_id'     => 'required',
            'sub_judul'     => 'required',
            'isi_materi'    => 'required',
        ]);

        $detail_materi = DB::table('detail_materi')->where('id', $id)->first();

        $isi_materi = $request->isi_materi;

        $dom = new DOMDocument();
        $dom->loadHTML($isi_materi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            // Check if the image is a new one
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_extension = explode('/', mime_content_type($img->getAttribute('src')))[1];

            // Validate image extension
                if (in_array($image_extension, ['jpg', 'jpeg', 'png', 'svg'])) {
                    $image_name = "/upload/" . time() . '_' . Str::random(10) . '.' . $image_extension;
                    file_put_contents(public_path() . $image_name, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
            }
        }

        $isi_materi = $dom->saveHTML();

        DB::table('detail_materi')->where('id', $id)->update([
            'materi_id'    => $request->materi_id,
            'sub_judul'    => $request->sub_judul,
            'isi_materi'   => $isi_materi,
        ]);

        Alert::info('Detail materi', 'Berhasil mengedit detail materi');
        return redirect('admin/detail_materi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('detail_materi')->where('id', $id)->delete();

        return redirect('admin/detail_materi');
    }
}