<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuis;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.id')
            ->select('kuis.*', 'materi.judul as judul_materi')
            ->get();

        return view('admin.kuis.index', compact('kuis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materi = DB::table('materi')->get();
        $kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.id')
            ->select('kuis.*', 'materi.judul as judul_materi')
            ->get();

        return view('admin.kuis.create', compact('kuis', 'materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([
            'materi_id'    => 'required',
            'soal'         => 'required',
            'a'            => 'required',
            'b'            => 'required',
            'c'            => 'required',
            'd'            => 'required',
            'kunci'        => 'required',
        ], 
        [
            'materi.required'   => 'Judul materi wajib diisi',
            'soal.required'     => 'Soal wajib diisi',
            'a.required'        => 'Pilihan A wajib diisi',
            'b.required'        => 'Pilihan B wajib diisi',
            'c.required'        => 'Pilihan C wajib diisi',
            'd.required'        => 'Pilihan D wajib diisi',
            'kunci.required'    => 'Kunci jawaban wajib diisi',
        ]);

        $soal = $request->soal;
 
        $dom = new DOMDocument();
        $dom->loadHTML($soal,9);
 
        $images = $dom->getElementsByTagName('img');
 
        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/admin/img" . time(). $key.'.png';
            file_put_contents(public_path().$image_name,$data);
 
            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }
        $soal = $dom->saveHTML();
 
        DetailMateri::create([
            'materi_id'     => $request->materi_id,
            'soal'          => $soal,
            'a'             => $request->a,
            'b'             => $request->b,
            'c'             => $request->c,
            'd'             => $request->d,
            'kunci'         => $request->kunci, 
        ]);
 
        Alert::success('Kuis', 'Berhasil menambahkan kuis');
        return redirect('kuis');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
