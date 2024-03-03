<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKuis extends Model
{
    use HasFactory;
    protected $table = 'hasil_kuis'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['skor', 'users_id', 'materi_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
