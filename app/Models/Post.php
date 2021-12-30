<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['category', 'user'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {

            // Give the Post where have A category has its slug equal to a slug requested
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });

        });

        $query->when($filters['user'] ?? false, function ($query, $user) {

            $query->whereHas('user', function ($query) use ($user) {
                $query->where('username', $user);
            });
        });


    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
