<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dynasty extends Model
{
    use HasFactory;
    protected $table = "dynastys";
    protected $fillable=[
        't_name',
        'vids',
        'capital',
        'created_at',
        'updated_at'
    ];
}
