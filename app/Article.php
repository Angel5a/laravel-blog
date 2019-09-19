<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Article extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getPreviewTextAttribute()
    {
        return Str::limit($this->body, $limit = 300, $end = '...');
    }

    public function getPublishedAtAttribute()
    {
        // TODO: remove after adding published_at field in db
        return $this->created_at;
    }

    public function scopeByUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function scopePublished(Builder $query)
    {
        // TODO: add published and published_at fields in db
        // Currently do nothing. All post published immediatlely after creation.
    }
}
