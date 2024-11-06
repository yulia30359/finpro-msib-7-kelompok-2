<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'idBook';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idBook', 'idCategory', 'titleBook', 'priceBook', 'authorBook', 'publisherBook', 'publishedBook', 'descriptionBook', 'coverBook', 'stockBook',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'idCategory');
    }
}