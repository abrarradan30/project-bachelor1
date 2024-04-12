<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id', 'materi_id', 'rating', 'saran']; 

    // Relasi many-to-one dengan model User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relasi one-to-many dengan model Materi
    public function materi() {
        return $this->belongsTo(Materi::class);
    }
}
