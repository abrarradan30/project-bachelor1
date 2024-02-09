<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresBelajar extends Model
{
    use HasFactory;
    protected $table = 'progres_belajar'; 
    protected $primaryKey = 'id';
    protected $fillable = ['status_selesai', 'materi_id', 'users_id'];

    // Relasi many-to-one dengan model User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relasi one-to-one dengan model Materi
    public function materi() {
        return $this->belongsTo(Materi::class);
    }
}
