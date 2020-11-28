<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use willvincent\Rateable\Rateable;

class Movie extends Model
{
    use Rateable;


    protected $fillable=['name','price','description', 'path', 'rating','percent' , 'year', 'poster', 'image'];

    protected $appends=['poster_path', 'image_path', 'is_favored'];
    public function getPosterPathAttribute()
    {
        return Storage::url('images/'.$this->poster);
    }
    public function getImagePathAttribute()
    {
        return Storage::url('images/'.$this->image);

    }

    public function getIsFavoredAttribute()
    {
        if (auth()->user()) {
            return (bool)$this->users()->where('user_id', auth()->user()->id)->count();
        }//end of if

        return false;

    }// end of getIsFavoredAttribute

    public function categories()
    {
        return $this->belongsToMany(Category::class,'movie_category');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class,'movie_actor');
    }

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_movie');

    }// end of users

    public function user()
    {
        return $this->belongsToMany('App\User', 'orders', 'movies_id', 'user_id')->withPivot('name','created_at');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);

    }// end of orders

    public function comments()
    {
        return $this->morphMany(MovieComment::class, 'commentable')->whereNull('parent_id');
    }


    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search,function($q) use ($search){
            return $q->where('name','like',"%$search%")
                ->orWhere('description','like',"%$search%")
                ->orWhere('year','like',"%$search%")
                ->orWhere('rating','like',"%$search%");
        });
    }

    public function scopeWhenCategory($query, $category)
    {
        return $query->when($category,function($q) use ($category){
            return $q->whereHas('categories',function($qu) use ($category){
                return $qu->whereIn('category_id',(array)$category)
                    ->orWhereIn('name',(array)$category);
            });
        });
    }
    public function scopeWhenFavorite($query, $favorite)
    {
        return $query->when($favorite, function ($q) {

            return $q->whereHas('users', function ($qu) {

                return $qu->where('user_id', auth()->user()->id);
            });

        });

    }// end of scopeWhenFavorite

}
