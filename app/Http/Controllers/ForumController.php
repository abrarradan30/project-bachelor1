<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumDiskusi;
use App\Models\User;
use App\Models\Materi;
use App\Models\BalasanDiskusi;
use RealRashid\SweetAlert\Facades\Alert;
use DOMDocument;
use DB;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
        
        $query = ForumDiskusi::join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->join('materi', 'forum_diskusi.materi_id', '=', 'materi.id')
            ->select('forum_diskusi.*', 'users.name as nama', 'users.foto', 'materi.judul as judul_materi',
                \DB::raw('(SELECT COUNT(*) FROM balasan_diskusi WHERE forum_diskusi.id = balasan_diskusi.forum_diskusi_id) AS jumlah_balasan'));
    
        // Filter berdasarkan materi
        if ($request->has('materi_id') && $request->materi_id != '') {
            $query->where('forum_diskusi.materi_id', $request->materi_id);
        }
    
        // Filter berdasarkan status
        if ($request->has('status_diskusi')) {
            $query->where('forum_diskusi.status_diskusi', $request->status_diskusi);
        }
    
        $forum_diskusi = $query->paginate(10);    

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

    public function store_balas(Request $request)
    {
        //
        $request->validate([
            //'users_id'            => 'required',
            'forum_diskusi_id'    => 'required',
            'balasan'             => 'required',
        ]);

        $balasan = $request->balasan;
 
        $dom = new DOMDocument();
        $dom->loadHTML($balasan,9);
 
        $images = $dom->getElementsByTagName('img');
 
        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/admin/img" . time(). $key.'.png';
            file_put_contents(public_path().$image_name,$data);
 
            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }
        $balasan = $dom->saveHTML();
 
        BalasanDiskusi::create([
            'users_id'            => auth()->user()->id,
            //'users_id'            => $request->users_id,
            'forum_diskusi_id'    => $request->forum_diskusi_id,
            'balasan'             => $balasan,
        ]);
 
        Alert::success('Balasan Diskusi', 'Berhasil membalas pertanyaan');
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
        
        $ar_status_diskusi = ['selesai', 'belum selesai'];
            
        return view('forum_balas', compact('materi', 'forum_diskusi', 'balasan_diskusi', 'ar_status_diskusi'));
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
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'status_diskusi'    => 'required',
        ]);
 
        $forum_diskusi->update([
            'status_diskusi'    => $request->status_diskusi,
        ]);

        Alert::info('Forum Diskusi', 'Diskusi selesai');
        return redirect('forum');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
