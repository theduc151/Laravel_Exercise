<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'promotion_id',
        'code',
        'name',
        'thumbnail',
        'description',
        'content',
        'status',
        'quantity',
        'price',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
