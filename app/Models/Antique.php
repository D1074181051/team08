<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function dynasty()
    {
        return $this->belongsTo('App\Models\Dynasty', 'dynasty_ID', 'id');
    }

    public static function scopeSmall($query)
    {
        $query->where('long', '<', 51,)
              ->where('width', '<', 51)
              ->orderBy('antiques.id');
    }

    public function scopeAllLocation($query)
    {
        $query->select('location')->groupBy('location');
    }


    public function scopeLocation($query, $pos)
    {
        $query->where('location', '=', $pos)
            ->orderBy('antiques.id');
    }

}
