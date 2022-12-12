<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackendController extends Controller
{
    function backendDashboard(){
        $total_categories = Category::all();
        $total_users = User::all();
        return view('Backend.dashboard', compact('total_categories', 'total_users'));
    }

    function BackendCategory(){
        $all_categories = Category::latest()->get();
        $trashed_categories = Category::onlyTrashed()->get();
        return view('Backend.category.category', compact('all_categories', 'trashed_categories'));
    }

    function BackendAddCategory(){
        return view('Backend.category.addCategory');
    }






    function categoryInsert(Request $request){
        $request->validate([
            'name' => 'required |max:50|unique:categories,name',
            'description' => 'required'
        ],
        [
            'name.required' => "Name field is required",
            'name.max' => "Name must be 50 characters",
            'description.required' => "Description field is required",
        ]);

        $slug = Str::slug($request->name, '-');
       /*  echo $slug;
        return $request->except('_token');
        die(); */
        Category::insert($request->except("_token") + [
            "slug" => $slug,
            "created_at" => Carbon::now()
        ]);
        /*return back()->withSuccess("Category inserted Successfully");*/
        return redirect('category/all');
    }



//=================UPDATE AND EDIT CATEGORY====================
    function updateCategory($category_id){
        $update_categoryInfo = Category::find($category_id);
        return view('Backend.category.updateCategory', compact('update_categoryInfo'));
    }

    function editCategory(Request $request, $category_id){
     /*    echo $category_id;
        return $request->name;
        return $request->description; */
        Category::find($category_id)->update([
            'name' =>  $request->name,
            'description' => $request ->description,
        ]);
        return redirect('category/all');
    }
//=========END UPDATE AND EDIT CATEGORY=======



//=========SOFT DELETE CATEGORY START==========
function deleteCategory($category_id){
    Category::find($category_id)->delete();
    return back()->withDeleting("Category Deleted successfully");
}
//===========SOFT DELETE CATEGORY END======



//===========permanent delete==========
function permanentDelete($category_id){
    Category::onlyTrashed()->find("$category_id")->forceDelete();
    return back()->with('permanent_delete', "Permanent Delete successfully");
}

//========== restore by id ================
function categoryRestore($category_id){
    Category::onlyTrashed()->find("$category_id")->restore();
    return back()->with('permanent_delete', "Category restore successfully");
}









/*==================================
                            PRODUCT START
=====================================*/
function products(){
    $all_products = Product::all();
    $trashed_products = Product::onlyTrashed()->get();
    return view('Backend.Products.products', compact('all_products', 'trashed_products'));
}

function productAdd(){
    return view('Backend.Products.addNewProduct');
}

function productInsert(Request $request){
    $request->validate([
        "product_name"=> 'required | max:25',
        "product_type" => "required",
        "product_category" => "required",
        "product_price" => 'required',
        "product_brand" => 'required',
        "product_unit" => 'required',
        "product_tag" => 'required',
        "product_description" => "required",

    ],
    [
        "product_name.required" => "Name field is required",
        "product_name.max" => "Name field maximum 25 characters",
        "product_category.required" => "Category field is required",
        "product_price.required" => "Product price is required",
        "product_brand.required" => "Product brand is required",
        "product_unit.required" => "Product unit is required",
        "product_tag.required" => "Product tag is required",
        "product_description.required" => "Product description is required",
    ]);
    Product::insert($request->except("_token") + ["created_at" => Carbon::now()]);
    return back()->withSuccess("Product Inserted Successfully.");
}

function productDelete($product_id){
    Product::find($product_id)->delete();
    return back()->with('delete_success', "Product Deleted Successfully");
}


function productPermanentDelete($product_id){
    Product::onlyTrashed()->find($product_id)->forceDelete();
    return back()->with('product_successfully', 'Product Permanent Delete successfully');

}



function productRestore($product_id){
   Product::onlyTrashed()->find($product_id)->restore();
   return back()->with('product_successfully', "Product restore successfully");
}



function editPage($product_id){
    $editProduct = Product::find($product_id);
    return view("Backend.Products.editProduct", compact('editProduct'));
}



function productUpdate(Request $request, $product_id){
   /*  echo "done";
    return $request; */
     Product::find($product_id)->update([
        "product_name"=> $request->product_name,
        "product_type"=> $request->product_type,
        "product_category"=> $request->product_category,
        "product_price" =>$request->product_price,
        "product_brand"=> $request->product_brand,
        "product_unit"=> $request->product_unit,
        "product_tag" => $request->product_tag,
        "product_description"=> $request->product_description,
     ]);
     return redirect("products/all");


}
/*===================
PRODUCT END
========================================*/












/*====================
 USER START
 =====================*/

 function users(){
    $all_users = User::all();
    return view("Backend.users.alluser", compact('all_users'));
 }





}



