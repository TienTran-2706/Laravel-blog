<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'thumbnail', 'featured_image', 'body', 'active', 'published_at', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_posts');
    }


    /**
     * Returns a shortened version of the body of the post,
     * with a maximum of 20 words and an ellipsis at the end.
     *
     * @return string The shortened body of the post.
     */
    public function shortBody(): string
    {
        return Str::word(strip_tags($this->body), 20, '...');
    }
}