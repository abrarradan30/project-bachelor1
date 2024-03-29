<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumDiskusi extends Model
{
    use HasFactory;
    protected $table = 'forum_diskusi'; // pemanggilan nama tabel
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = ['users_id', 'materi_id', 'pertanyaan', 'status_diskusi']; // pemanggilan kolom

    // Relasi many-to-one dengan model User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relasi one-to-many dengan model Materi
    public function materi() {
        return $this->hasMany(Materi::class);
    }
    // Relasi one-to-many dengan model BalasanDiskusi
    public function balasan_diskusi() {
        return $this->hasMany(BalasanDiskusi::class);
    }
}
