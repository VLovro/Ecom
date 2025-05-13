<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;



class ProductController extends Controller
{
    public function index(Request $request, $group = null, $category = null)
{

$validGroups = Category::distinct()->pluck('group');

// 2. 404 if group is invalid
if ($group && ! $validGroups->contains($group)) {
    abort(404);
}


$subcategories = $group
    ? Category::where('group', $group)->pluck('name')
    : collect();


if ($category && ! $subcategories->contains($category)) {
    abort(404);
}


$query = Product::with(['brand','team','categories','sizes']);

if ($group) {
    $query->whereHas('categories', fn($q) => $q->where('group', $group));
}

if ($category) {
    $query->whereHas('categories', fn($q) => $q->where('name', $category));
}

$products = $query->paginate(12);

return view('products.index', [
    'products'         => $products,
    'groups'           => $validGroups,
    'currentGroup'     => $group,
    'subcategories'    => $subcategories,
    'currentCategory'  => $category,
]);
}
}
