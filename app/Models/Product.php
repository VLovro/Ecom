<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Team;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'gender',
        'image_path',
        'stock',
        'brand_id',
        'team_id',
    ];
    public function categories()
    {

        return $this->belongsToMany(Category::class);
    }
    public function sizes(){
        return $this-> belongsToMany(Size::class);
    }
    public function brand()
{
    return $this->belongsTo(Brand::class);
}

    public function team()
{
    return $this->belongsTo(Team::class);
}


}
