<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumDiskusi;
use App\Models\User;
use App\Models\Materi;
use RealRashid\SweetAlert\Facades\Alert;
use DOMDocument;
use DB;

class ForumDiskusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builer
        // $forum_diskusi = ForumDiskusi::join('users', 'forum_diskusi.users_id', '=', 'users.id')
        //     ->join('materi', 'forum_diskusi.materi_id', '=', 'materi.id')
        //     ->select('forum_diskusi.*', 'users.name as nama', 'materi.judul as judul_materi')
        //     ->get();

        $materi = DB::table('materi')->get();

        return view('admin.forum_diskusi.index', compact('materi'));
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        //
        $request->validate([
            //'users_id'          => 'required',
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
            //'users_id'           => $request->users_id,
            'materi_id'          => $request->materi_id,
            'pertanyaan'         => $pertanyaan, 
            'status_diskusi'     => $request->status_diskusi, 
        ]);
 
        Alert::success('Forum Diskusi', 'Berhasil menambahkan diskusi');
        return redirect('forum_diskusi');
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
            ->where('forum_diskusi.materi_id', $id)
            ->get();

        $forum_diskusi2 = ForumDiskusi::join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->join('materi', 'forum_diskusi.materi_id', '=', 'materi.id')
            ->select('forum_diskusi.materi_id', 'materi.judul as judul_materi')
            ->groupBy('forum_diskusi.materi_id', 'materi.judul')
            ->where('forum_diskusi.materi_id', $id)
            ->get();
            
        return view('admin.forum_diskusi.detail', compact('forum_diskusi', 'forum_diskusi2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $users = DB::table('users')->get();
        $materi = DB::table('materi')->get();
        $forum_diskusi = ForumDiskusi::join('users', 'forum_diskusi.users_id', '=', 'users.id')
            ->join('materi', 'forum_diskusi.materi_id', '=', 'materi.id')
            ->select('forum_diskusi.*', 'users.name', 'materi.judul')
            ->where('forum_diskusi.id', $id)
            ->get();
        $ar_status_diskusi = ['selesai', 'belum selesai'];

        return view('admin.forum_diskusi.edit', compact('forum_diskusi', 'users', 'materi', 'ar_status_diskusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            //'users_id'          => 'required',
            'materi_id'         => 'required',
            'pertanyaan'        => 'required',
            'status_diskusi'    => 'required',
        ]);

        $forum_diskusi = ForumDiskusi::find($id);
 
        $pertanyaan = $request->pertanyaan;
 
        $dom = new DOMDocument();
        $dom->loadHTML($pertanyaan,9);
 
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
        $pertanyaan = $dom->saveHTML();
 
        $forum_diskusi->update([
            //'users_id'          => $request->users_id,
            'materi_id'         => $request->materi_id,
            'pertanyaan'        => $pertanyaan,
            'status_diskusi'    => $request->status_diskusi,
        ]);
 
        Alert::info('Forum Diskusi', 'Berhasil mengedit forum diskusi');
        return redirect('forum_diskusi');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('forum_diskusi')->where('id', $id)->delete();

        return redirect('forum_diskusi');
    }
}