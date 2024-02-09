<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMateri extends Model
{
    use HasFactory;
    protected $table = 'detail_materi'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['materi_id', 'sub_judul', 'isi_materi'];

    // Relasi one-to-one dengan model Materi
    public function materi() {
        return $this->belongsTo(Materi::class);
    }
}
