<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likeable extends Model
{
    protected $fillable = [
        'user_id', 'likeable_id', 'likeable_type',
    ];

    public function news()
    {
        return $this->morphedByMany(News::class, 'likeable');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'likeable');
    }
}
