<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materi'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['judul', 'bg_materi', 'deskripsi', 'harga', 'kategori', 'level', 'status'];
    public $timestamps = true;

    // Relasi one-to-one dengan model Pembayaran
    public function pembayaran() {
        return $this->hasOne(Pembayaran::class);
    }
    // Relasi one-to-many dengan model ForumDiskusi
    public function forum_diskusi() {
        return $this->belongsTo(ForumDiskusi::class);
    }
    // Relasi one-to-many dengan model Kuis
    public function kuis() {
        return $this->hasMany(Kuis::class);
    }
     // Relasi one-to-many dengan model Hasil Kuis
    public function hasil_kuis() {
        return $this->hasMany(HasilKuis::class);
    }
    // Relasi one-to-one dengan model DetailMateri
    public function detail_materi() {
        return $this->hasOne(DetailMateri::class);
    }
    // Relasi one-to-one dengan model Sertifikat
    public function sertifikat() {
        return $this->hasOne(Sertifikat::class);
    }
    // Relasi one-to-one dengan model ProgresBelajar
    public function progres_belajar() {
        return $this->hasOne(ProgresBelajar::class);
    }
}