<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoopingCartModel extends Model
{
    use HasFactory;

    protected $table = 'shopping_carts';

    protected $fillable = [
        'user_id', 'book_id', 'qty', 'price', 'unique_id',
    ];
   
}
