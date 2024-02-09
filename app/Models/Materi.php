<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materi'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['judul', 'deskripsi', 'harga', 'kategori', 'level', 'jenis', 'status'];

    // Relasi one-to-one dengan model Pembayaran
    public function pembayaran() {
        return $this->hasOne(Pembayaran::class);
    }
    // Relasi one-to-many dengan model ForumDiskusi
    public function forumDiskusi() {
        return $this->belongsTo(ForumDiskusi::class);
    }
    // Relasi one-to-many dengan model Kuis
    public function kuis() {
        return $this->belongsTo(Kuis::class);
    }
    // Relasi one-to-one dengan model DetailMateri
    public function detailMateri() {
        return $this->hasOne(DetailMateri::class);
    }
    // Relasi one-to-one dengan model Sertifikat
    public function sertifikat() {
        return $this->hasOne(Sertifikat::class);
    }
    // Relasi one-to-one dengan model ProgresBelajar
    public function progresBelajar() {
        return $this->hasOne(ProgresBelajar::class);
    }
}
