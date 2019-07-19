<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User;

class Post extends Model
{
    //

    use SoftDeletes; 

    protected $fillable = [
        'title', 'description', 'content', 'image', 'user_id', 'published_at', 'category_id'
    ];

    /**
     * Delete post image from storage
     * @return void
     */


    public function deleteImage() { 
        Storage::delete($this->image); 
    }

    public function category(){ 
        return $this->belongsTo(Category::class); 
    }

    public function tags() { 
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId){ 
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function user() { 
        return $this->belongsTo(User::class);
    }

    public function scopeSearched($query) { 
        $search = request()->query('search');

        if(!$search){ 
            return $query; 
        }

        return $query->where('title', 'LIK E', "%{$search}%");
    }

}
