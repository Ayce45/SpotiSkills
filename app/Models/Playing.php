<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playing extends Model
{
    use HasFactory;

    protected $table = 'Playing';
    public $timestamps = false;
}
