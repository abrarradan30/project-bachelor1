<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumDiskusi extends Model
{
    use HasFactory;
    protected $table = 'forum_diskusi'; // pemanggilan nama tabel
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = ['users_id', 'topic', 'pertanyaan', 'detail_pertanyaan', 'post', 'status_diskusi']; // pemanggilan kolom

    public function users()
    {
        return $this->hasMany(Users::class); // memanggil relasi antara tabel users dan forum diskusi
    }
}
