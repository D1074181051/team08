<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antique extends Model
{
    use HasFactory;
    protected $table = "antiques";
    protected $fillable=[
        'p_name',
        'dynasty_ID',
        'location',
        'long',
        'width',
        'created_at',
        'updated_at'
    ];
}
