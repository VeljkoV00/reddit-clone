<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    public $table = 'communities';
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'slug'
    ];
}
