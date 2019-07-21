<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use Sluggable;

    protected $fillable = [
        'chapter_name', 'chapter_content',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'chapter_name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'chapter_name';
    }

    public function novels()
    {
        return $this->belongsTo(Novel::class, 'novel_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public static function findPrevious($id, $novel_id)
    {
        return static::where('id', '<', $id)
            ->where('novel_id', '=', $novel_id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public static function findNext($id, $novel_id)
    {
        return static::where('id', '>', $id)
            ->where('novel_id', '=', $novel_id)
            ->orderBy('id', 'asc')
            ->first();
    }
}
