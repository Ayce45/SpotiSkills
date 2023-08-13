<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignupRequest extends Model {

    use HasFactory;

    public $timestamps = false;
    public $table = 'SignupRequest';
    protected $fillable = ['email', 'password', 'first_name', 'last_name', 'status'];
    protected $hidden = ['password', 'status'];
}
