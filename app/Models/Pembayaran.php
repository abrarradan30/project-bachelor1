<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['code', 'users_id', 'materi_id', 'status', 'snap_token'];

    // Relasi many-to-one dengan model User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relasi one-to-one dengan model Materi
    public function materi() {
        return $this->belongsTo(Materi::class);
    }
}
