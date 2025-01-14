<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'user_id'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    //attach tag
    public function tag(string $name){
        //make tag if it doesn't exist
        $tag=Tag::firstOrCreate(['name'=>$name]);
        //attach tag
        $this->tags()->attach($tag);
        return;
    }

    //get related tags
    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }
    #Add comments

    public function comments(): HasMany{
        return $this->hasMany(Comment::class);
    }
}
