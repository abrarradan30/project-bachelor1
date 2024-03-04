<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalasanDiskusi extends Model
{
    use HasFactory;
    protected $table = 'balasan_diskusi'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['users_id', 'forum_diskusi_id', 'balasan'];
    
    // Relasi many-to-one dengan model User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relasi many-to-one dengan model ForumDiskusi
    public function forum_diskusi() {
        return $this->belongsTo(ForumDiskusi::class);
    }
}
