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
            ->select('balasan_diskusi.*', 'users.name as nama', 'forum_diskusi.topik as topik_diskusi')
            ->get();

        return view('admin.balasan_diskusi.index', compact('balasan_diskusi'));
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
