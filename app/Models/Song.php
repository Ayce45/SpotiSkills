<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = 'Song';
    public $timestamps = false;
    protected $fillable = ['title', 'artist', 'album_id'];
    protected $hidden = ['album_id'];
}
