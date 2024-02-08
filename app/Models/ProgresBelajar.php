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
}
