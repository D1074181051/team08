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

    public static function scopeALLData($query)
    {
        $query->join('dynastys', 'antiques.dynasty_ID', '=', 'dynastys.id')
            ->orderBy('antiques.id')
            ->select(
                'antiques.id',
                'antiques.p_name',
                'dynastys.t_name',
                'antiques.location',
                'antiques.long',
                'antiques.width');
    }

    public static function scopeSmall($query)
    {
        $query->join('dynastys', 'antiques.dynasty_ID', '=', 'dynastys.id')
            ->where('long', '<', 51,)
            ->where('width', '<', 51)
            ->orderBy('antiques.id')
            ->select(
                'antiques.id',
                'antiques.p_name',
                'dynastys.t_name',
                'antiques.location',
                'antiques.long',
                'antiques.width');
    }

    public function scopeAllLocation($query)
    {
        $query->select('location')->groupBy('location');
    }


    public function scopeLocation($query, $pos)
    {
        $query->join('dynastys', 'antiques.dynasty_ID', '=', 'dynastys.id')
            ->where('location', '=', $pos)
            ->orderBy('antiques.id')
            ->select(
                'antiques.id',
                'antiques.p_name',
                'dynastys.t_name',
                'antiques.location',
                'antiques.long',
                'antiques.width');
    }

}
