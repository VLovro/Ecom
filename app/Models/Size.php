<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Size extends Model
{
    use HasFactory;
    protected $fillable = ['label','type'];

   
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
