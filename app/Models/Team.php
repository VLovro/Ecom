<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;  

class Team extends Model
{
    protected $fillable = ['team_name'];
    public function products()
{
    return $this->hasMany(Product::class);
}
}
