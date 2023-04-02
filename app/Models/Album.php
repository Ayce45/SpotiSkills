<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Album extends Model
{
    use HasFactory;

    protected $table = 'Album';
    public $timestamps = false;
    protected $fillable = ['title', 'artist', 'releaseDate'];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
