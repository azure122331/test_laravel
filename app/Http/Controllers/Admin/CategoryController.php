<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function categories(){
        Session::put("page","categories");
        $category = Category::all();
        // print_r($category);
        // die;
        return view("admin.category.categories")->with(compact("category"));
    }
    public function category(){
        $categories = Category::get();
        return view("admin.category.category")->with(compact("category"));
    }
}
