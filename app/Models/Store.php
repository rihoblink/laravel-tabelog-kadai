<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Store extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'hours',
        'code',
        'address',
        'phone',
        'holiday',
        'category_id',
        'image',
        'recommend_flag',
        'carriage_flag',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorited_users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
