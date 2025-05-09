<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;  
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Team extends Model
{
    use HasFactory;
    
    protected $fillable = ['team_name'];
    public function products()
{
    return $this->hasMany(Product::class);
}
}
