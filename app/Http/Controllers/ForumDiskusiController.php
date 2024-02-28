<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumDiskusi;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class ForumDiskusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builer
        $forum_diskusi = ForumDiskusi::join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->join('materi', 'forum_diskusi.materi_id', '=', 'materi.id')
            ->select('forum_diskusi.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.forum_diskusi.index', compact('forum_diskusi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $forum_diskusi = ForumDiskusi::join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->join('materi', 'forum_diskusi.materi_id', '=', 'materi.id')
            ->select('forum_diskusi.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->get();

        return view('admin.forum_diskusi.create', compact('forum_diskusi', 'users', 'materi'));
        // return view('admin.forum_diskusi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
    // Validasi data
    $request->validate([
        'users_id'          => 'required',
        'materi_id'         => 'required',
        'pertanyaan'        => 'required',
        'status_diskusi'    => 'required',
    ], [
        'users_id.required'         => 'Nama wajib diisi',
        'materi.required'           => 'Judul materi wajib diisi',
        'pertanyaan.required'       => 'Pertanyaan wajib diisi',
        'status_diskusi.required'   => 'Status diskusi wajib diisi',
    ]);

    // Proses pengelolaan gambar
    $pertanyaan = $request->pertanyaan;

    $dom = new DOMDocument();
    $dom->loadHTML($pertanyaan, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

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

    $pertanyaan = $dom->saveHTML();

    // Simpan data ke database
    DB::table('forum_diskusi')->insert([
        'users_id'           => $request->users_id,
        'materi_id'          => $request->materi_id,
        'pertanyaan'         => $pertanyaan, 
        'status_diskusi'     => $request->status_diskusi,
    ]);

    Alert::success('Diskusi', 'Berhasil menambahkan diskusi');
    return redirect('admin/forum_diskusi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $forum_diskusi = ForumDiskusi::join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->join('materi', 'forum_diskusi.materi_id', '=', 'materi.id')
            ->select('forum_diskusi.*', 'users.name as nama', 'materi.judul as judul_materi')
            ->where('forum_diskusi.id', $id)
            ->get();
            
        return view('admin.forum_diskusi.detail', compact('forum_diskusi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $forum_diskusi = DB::table('forum_diskusi')->where('id', $id)->get();
        $ar_status_diskusi = ['selesai', 'belum selesai'];

        return view('admin.forum_diskusi.edit', compact('forum_diskusi', 'users', 'ar_status_diskusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'users_id'          => 'required',
            'materi_id'         => 'required',
            'pertanyaan'        => 'required',
            'status_diskusi'    => 'required',
        ]);

        $forum_diskusi = DB::table('forum_diskusi')->where('id', $id)->first();

        $pertanyaan = $request->pertanyaan;

        $dom = new DOMDocument();
        $dom->loadHTML($pertanyaan, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

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

        $pertanyaan = $dom->saveHTML();

        DB::table('forum_diskusi')->where('id', $id)->update([
            'users_id'          => $request->users_id,
            'materi_id'         => $request->materi_id,
            'pertanyaan'        => $pertanyaan,
            'status_diskusi'    => $request->status_diskusi,
        ]);

        Alert::info('Diskusi', 'Berhasil mengedit diskusi');
        return redirect('admin/forum_diskusi');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('forum_diskusi')->where('id', $id)->delete();

        return redirect('admin/forum_diskusi');
    }
}
