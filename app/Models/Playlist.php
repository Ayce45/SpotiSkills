<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $table = 'Playlist';
    public $timestamps = false;
    protected $fillable = ['title', 'author', 'songs'];

    public function songs()
    {
        return Song::whereIn('id', json_decode($this->songs))->get();
    }
}
