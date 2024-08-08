<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materis';
    protected $fillable = ['kursus_id', 'judul', 'deskripsi', 'link_embed'];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }
}
