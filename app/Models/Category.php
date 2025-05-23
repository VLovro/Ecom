<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;  
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'group'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
