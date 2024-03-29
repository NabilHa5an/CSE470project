<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {

        $featured_products = Product::where('status','1')->take(50)->get();
        $trending_category = Category::where('popular','1')->take(15)->get();
        return view('frontend.index',compact('featured_products','trending_category'));
    }

    public function category()
    {
        $category = Category::where('status','1')->get();
        return view('frontend.category',compact('category'));
    }

    public function viewcategory($meta_title)
    {
        if(Category::where('meta_title',$meta_title)->exists())
        {
            $category = Category::where('meta_title',$meta_title)->first();
            $products = Product::where('cate_id',$category->id)->where('status','1')->get();
            return view('frontend.products.index',compact('category','products'));
        }
        else{
            return redirect('/')->with('status',"Broken Link");
        }
    }

    public function productview($cate_meta_title, $prod_meta_title)
    {
        if(Category::where('meta_title',$cate_meta_title)->exists())
        {

            if(Product::where('meta_title',$prod_meta_title)->exists())
            {
                 $products = Product::where('meta_title',$prod_meta_title)->first();
                 return view('frontend.products.view', compact('products'));
            }
            else{
                return redirect('/')->with('status',"Broken Link");
            }
        }
        else{
            return redirect('/')->with('status',"Broken Link");
        }

    }
}
