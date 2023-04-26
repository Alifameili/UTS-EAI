<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class student extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'student';
    protected $fillable = [
        'username',
        'address'
    ];
    protected $hiden = [];
}
