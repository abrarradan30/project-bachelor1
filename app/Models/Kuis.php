<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    use HasFactory;
    protected $table = 'kuis';
    protected $primaryKey = 'id';
    protected $fillable = ['pertanyaan', 'skor', 'materi_id', 'users_id']; 

    // Relasi many-to-one dengan model User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relasi one-to-many dengan model Materi
    public function materis() {
        return $this->hasMany(Materi::class);
    }
    // Relasi one-to-one dengan model Jawaban
    public function jawaban() {
        return $this->hasOne(Jawaban::class);
    }
}
