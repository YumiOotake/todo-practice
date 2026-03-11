<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'status_id',
        'title',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function status()
    {
        return $this->belongsTo(status::class);
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id))
            {
                $query->where('category_id', $category_id);
            }
    }
    public function scopeStatusSearch($query, $status_id)
    {
        if (!empty($status_id)) {
            $query->where('status_id', $status_id);
        }
    }
    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('title', 'like', '%'. $keyword . '%');
        }
        return $query;
    }
}
