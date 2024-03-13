<?php

namespace App\Http\Controllers;
use App\Models\BalasanDiskusi;
use App\Models\User;
use App\Models\ForumDIskusi;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

use Illuminate\Http\Request;

class BalasanDiskusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $balasan_diskusi = BalasanDiskusi::join('users', 'balasan_diskusi.users_id', '=', 'users.id')
            ->join('forum_diskusi', 'balasan_diskusi.forum_diskusi_id', '=', 'forum_diskusi.id')
            ->select('balasan_diskusi.*', 'users.name as nama', 'forum_diskusi.pertanyaan')
            ->get();

        return view('admin.balasan_diskusi.index', compact('balasan_diskusi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = DB::table('users')->get();
        $forum_diskusi = DB::table('forum_diskusi')->get();
        $balasan_diskusi = BalasanDiskusi::join('users', 'balasan_diskusi.users_id', '=', 'users.id')
            ->join('forum_diskusi', 'balasan_diskusi.forum_diskusi_id', '=', 'forum_diskusi.id')
            ->select('balasan_diskusi.*', 'users.name as nama', 'forum_diskusi.pertanyaan')
            ->get();

        return view('admin.balasan_diskusi.index', compact('balasan_diskusi', 'users', 'materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'users_id'            => 'required',
            'forum_diskusi_id'    => 'required',
            'balasan'             => 'required',
        ], 
        [
            'users_id.required'            => 'User wajib diisi',
            'forum_diskusi_id.required'    => 'Topik Diskusi wajib diisi',
            'balasan.required'             => 'Isi materi wajib diisi',
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
            'users_id'            => $request->users_id,
            'forum_diskusi_id'    => $request->forum_diskusi_id,
            'balasan'             => $balasan,
        ]);
 
        Alert::success('Balasan Diskusi', 'Berhasil menambahkan balasan diskusi');
        return redirect('balasan_diskusi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $balasan_diskusi = BalasanDiskusi::join('users', 'balasan_diskusi.users_id', '=', 'users.id')
            ->join('forum_diskusi', 'balasan_diskusi.forum_diskusi_id', '=', 'forum_diskusi.id')
            ->select('balasan_diskusi.*', 'users.name as nama', 'forum_diskusi.pertanyaan')
            ->where('balasan_diskusi.id', $id)
            ->get();

        return view('admin.balasan_diskusi.index', compact('balasan_diskusi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $users = DB::table('users')->get();
        $forum_diskusi = DB::table('forum_diskusi')->get();
        $balasan_diskusi = DB::table('balasan_diskusi')->where('id', $id)->get();

        return view('admin.balasan_diskusi.edit', compact('balasan_diskusi', 'users', 'forum_diskusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'users_id'            => 'required',
            'forum_diskusi_id'    => 'required',
            'balasan'             => 'required',
        ], 
        [
            'users_id.required'            => 'User wajib diisi',
            'forum_diskusi_id.required'    => 'Topik Diskusi wajib diisi',
            'balasan.required'             => 'Isi materi wajib diisi',
        ]);

        $balasan_diskusi = BalasanDiskusi::find($id);
 
        $balasan = $request->balasan;
 
        $dom = new DOMDocument();
        $dom->loadHTML($balasan,9);
 
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
        $balasan = $dom->saveHTML();
 
        $balasan_diskusi->update([
            'materi_id'    => $request->materi_id,
            'sub_judul'    => $request->sub_judul,
            'balasan'      => $balasan,
        ]);
 
        Alert::info('Balasan Diskusi', 'Berhasil mengedit balasan diskusi');
        return redirect('balasan_diskusi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('balasan_diskusi')->where('id', $id)->delete();

        return redirect('admin/balasan_diskusi');
    }
}