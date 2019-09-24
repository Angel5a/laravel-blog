<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'article_id',
    ];
    
    /**
     * Get preview text (can be used in comment preview, like on index page).
     * 
     * return string
     */
    public function getPreviewTextAttribute()
    {
        return Str::limit($this->body, $limit = 300, $end = '...');
    }

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
     * Get the user that owns this article.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
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
     * @param int $id
     */
    public function scopeByArticleId(Builder $query, $id)
    {
        $query->where('article_id', $id);
    }
}
