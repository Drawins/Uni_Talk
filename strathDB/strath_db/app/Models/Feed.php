<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content'
    ];

    protected $appends = ['liked'];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class); 
    }



    public function getLikedAttribute(): bool
    {
        return (bool) $this->likes()->where('feed_id', $this->id)->where('user_id', auth()->id())->exists();
    }


    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class); 
    }

}
