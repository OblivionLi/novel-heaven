<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'genre_name',
    ];

    public function novels()
    {
        return $this->belongsToMany(Novel::class);
    }
}
