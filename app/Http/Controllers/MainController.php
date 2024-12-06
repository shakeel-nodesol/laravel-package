<?php

namespace App\Http\Controllers;

use App\Data\CategoryData;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = CategoryData::from(Category::with('children')->get());

        return response()->json($data);
    }
    public function storeCategoryProduct(CategoryData $categoryData)
    {
        $category = Category::create(['name' => $categoryData->name]);
        $category->products()->create($categoryData->product->toArray());

        return redirect()->back();
    }
}
