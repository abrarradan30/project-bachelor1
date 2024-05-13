<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumDiskusi;
use App\Models\User;
use App\Models\Materi;
use App\Models\BalasanDiskusi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $materi = DB::table('materi')->get();

        $forum_diskusi = ForumDiskusi::join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->join('materi', 'forum_diskusi.materi_id', '=', 'materi.id')
            ->select('forum_diskusi.*', 'users.name as nama', 'users.foto', 'materi.judul as judul_materi',
                \DB::raw('(SELECT COUNT(*) FROM balasan_diskusi WHERE forum_diskusi.id = balasan_diskusi.forum_diskusi_id) AS jumlah_balasan'))
            ->get()->all();
        
        $balasan_diskusi = BalasanDiskusi::join('users', 'balasan_diskusi.users_id', '=', 'users.id')
            ->join('forum_diskusi', 'balasan_diskusi.forum_diskusi_id', '=', 'forum_diskusi.id')
            ->select('balasan_diskusi.*', 'users.name as nama', 'users.foto', 'forum_diskusi.pertanyaan')
            ->get();

        return view('forum', compact('materi', 'forum_diskusi',  'balasan_diskusi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            // 'users_id'          => 'required',
            'materi_id'         => 'required',
            'pertanyaan'        => 'required',
            'status_diskusi'    => 'required',
        ]);

        $pertanyaan = $request->pertanyaan;
 
        $dom = new DOMDocument();
        $dom->loadHTML($pertanyaan,9);
 
        $images = $dom->getElementsByTagName('img');
 
        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/admin/img" . time(). $key.'.png';
            file_put_contents(public_path().$image_name,$data);
 
            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }
        $pertanyaan = $dom->saveHTML();

        ForumDiskusi::create([
            'users_id'           => auth()->user()->id,
            // 'users_id'           => $request->users_id,
            'materi_id'          => $request->materi_id,
            'pertanyaan'         => $pertanyaan, 
            'status_diskusi'     => $request->status_diskusi, 
        ]);

        Alert::success('Forum Diskusi', 'Berhasil menambahkan diskusi');
        return redirect('forum');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $materi = DB::table('materi')->get();
        $forum_diskusi = ForumDiskusi::join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->join('materi', 'forum_diskusi.materi_id', '=', 'materi.id')
            ->select('forum_diskusi.*', 'users.name as nama', 'users.foto', 'materi.judul as judul_materi')
            ->where('forum_diskusi.id', $id)
            ->get();
        
        $balasan_diskusi = BalasanDiskusi::join('users', 'balasan_diskusi.users_id', '=', 'users.id')
            ->join('forum_diskusi', 'balasan_diskusi.forum_diskusi_id', '=', 'forum_diskusi.id')
            ->select('balasan_diskusi.*', 'users.name as nama', 'users.foto', 'forum_diskusi.pertanyaan')
            ->where('balasan_diskusi.forum_diskusi_id', $id)
            ->get();
            
        return view('forum_balas', compact('materi', 'forum_diskusi', 'balasan_diskusi'));
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
