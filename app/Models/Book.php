<?php

namespace App\Models;

use App\Enums\BookStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'release_date',
        'cover_image_path',
        'category',
        'price',
        'status',
        'rent_end_date',
        'buyer_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'release_date' => 'date',
        'price' => 'decimal:2',
        'status' => BookStatus::class,
        'rent_end_date' => 'datetime',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
}
