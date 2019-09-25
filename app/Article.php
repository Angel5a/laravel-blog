<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Get the user that owns this article.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get comments for this article.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get preview text (can be used in article preview, like on index page).
     * 
     * return string
     */
    public function getPreviewTextAttribute()
    {
        return Str::limit($this->body, $limit = 300, $end = '...');
    }

    /**
     * Get published date.
     * 
     * @return Carbon
     */
    public function getPublishedAtAttribute()
    {
        // TODO: remove after adding published_at field in db
        return $this->created_at;
    }

    /**
     * @param Builder $query
     * @param int $id
     */
    public function scopeByUserId(Builder $query, $id)
    {
        $query->where('user_id', $id);
    }

    /**
     * @param Builder $query
     */
    public function scopePublished(Builder $query)
    {
        // TODO: add published and/or published_at fields in db
        // Currently do nothing. All post published immediatlely after creation.
    }

    /**
     * Determine whether the article is published.
     *
     * @return bool
     */
    public function isPublished()
    {
        // TODO: this
        return true;
    }
}
