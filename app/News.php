<?php

namespace App;

use Auth;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'article',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Find a model by its primary slug.
     *
     * @param string $slug
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public static function findBySlug(string $slug, array $columns = ['*'])
    {
        return static::whereSlug($slug)->first($columns);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likeables()
    {
        return $this->morphToMany(Likeable::class, 'likeable');
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likeables()->whereUserId(Auth::user()->id)->first();
        return (!is_null($like)) ? true : false;
    }

    public function getLikesAttribute()
    {
        $likes = Likeable::whereLikeableId($this->id)->count();
        return $likes;
    }
}
