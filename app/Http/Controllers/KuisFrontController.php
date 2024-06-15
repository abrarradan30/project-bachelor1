<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuis;
use App\Models\User;
use App\Models\Materi;
use App\Models\HasilKuis;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class KuisFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $soal_kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.id')
            ->select('kuis.*', 'materi.judul as judul_materi')
            ->get();

        return view('soal_kuis', compact('soal_kuis'));
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
            'users_id'     => 'required',
            'materi_id'    => 'required',
        ]); 

        $materi_id = $request->materi_id;
        $user_id = $request->users_id;

        // Ambil soal dan kunci jawaban dari database
        $kuis = Kuis::where('materi_id', $materi_id)->select('id', 'soal', 'a', 'b', 'c', 'd', 'kunci')->get();

        $total_questions = $kuis->count();

        // mengkoreksi jawaban benar berdasarkan kunci
        $correct_answers = 0;
        foreach ($kuis as $index => $soal) {
            $user_answer = $request->input('q' . ($index + 1));

            // Ambil kunci jawaban dari soal
            $correct_key = $soal->kunci;

            // Ambil jawaban yang benar berdasarkan kunci
            $correct_answer = $soal->$correct_key;

            if ($user_answer == $correct_key) {
                $correct_answers += 5; // Setiap jawaban benar bernilai 5 poin
            }
        }

        // Hitung skor
        $score = ($correct_answers / $total_questions) * 100;

        DB::table('hasil_kuis')->insert([
            'users_id'     => $user_id,
            'materi_id'    => $materi_id,
            'skor'         => $score,
        ]);

        Alert::success('Kuis', 'Selesai mengerjakan kuis');
        return redirect('progres_materi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $soal_kuis = DB::table('kuis')
            ->join('materi', 'kuis.materi_id', '=', 'materi.id')
            ->select('kuis.*', 'materi.judul', 'materi.level')
            ->where('kuis.id', $id)
            ->get();

        $isi_kuis = DB::table('kuis')
            ->where('materi_id', $id)
            ->get();

        return view('soal_kuis', compact('soal_kuis', 'isi_kuis'));
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
