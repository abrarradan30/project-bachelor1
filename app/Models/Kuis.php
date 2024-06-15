<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    use HasFactory;
    protected $table = 'kuis';
    protected $primaryKey = 'id';
    protected $fillable = ['materi_id', 'soal', 'a', 'b', 'c', 'd', 'kunci']; 

    // Relasi many-to-one dengan model User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relasi one-to-many dengan model Materi
    public function materi() {
        return $this->belongsTo(Materi::class);
    }
}
