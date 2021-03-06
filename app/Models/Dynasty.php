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
        's_time',
        'e_time',
        'capital',
        'created_at',
        'updated_at'
    ];

    public function antiques()
    {
        return $this->hasMany('App\Models\Antique', 'dynasty_ID');
    }

    public  function delete()
    {
        $this->antiques()->delete();
        return parent::delete();
    }

    public function scopeAllCapital($query)
    {
        $query->select('capital')->groupBy('capital');
    }


    public function scopeCapital($query, $pos)
    {
        $query->where('capital', '=', $pos)
            ->orderBy('dynastys.id');
    }
}
