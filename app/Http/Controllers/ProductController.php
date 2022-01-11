<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $data = Product::paginate(6);
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }
        return view("index", ["products" => $data, "is_empty"=>false, "login_token" => $is_user_logged_in, "role" => $role]);
    }

    public function getAll(){
        $data = Product::all();
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }
        return view("manage-product", ["products" => $data, "login_token" => $is_user_logged_in, "role" => $role]);
    }

    public function getProductDetail(Product $product){
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }

        return view("product-detail", ["product" => $product, "is_empty" => false, "login_token" => $is_user_logged_in, "role" => $role]);
    }

    public function searchProduct(Request $request){
        if(empty($request->search_bar)){
            $data = Product::paginate(6);
        }else {
            $data = Product::where("name", "LIKE", "%$request->search_bar%")
                            ->paginate(6);
        }

        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }
        return view("index", ["products" => $data, "is_empty" => false, "login_token" => $is_user_logged_in, "role" => $role]);
    }

    public function deleteProduct(Product $product){
        File::delete(public_path($product->image_path));
        $product->delete();
        return redirect()->route("product.show");
    }

    public function addNewShow(){
        $categories = Category::all();
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }
        return view("add-product", ["categories" => $categories, "login_token" => $is_user_logged_in, "role" => $role]);
    }

    public function addNewProduct(Request $request){
        $request->validate([
            "name" => "required|min:5|unique:products,name",
            "description" => "required|min:50",
            "price" => "required|numeric|gt:0",
            "category" => "required",
            "image" => "required|mimes:jpg,jpeg"
        ]);
        $image = $request->file("image");
        $filename = time().".".$image->getClientOriginalExtension();
        $image->move(public_path("image"), $filename);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->image_path = "image/".$filename;
        $product->save();
        
        return redirect()->route("product.show");
    }

    public function editShow(Product $product){
        $categories = Category::all();
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }

        return view("edit-product", ["categories" => $categories, "product" => $product, "login_token" => $is_user_logged_in, "role" => $role]);
    }

    public function editProduct(Product $product, Request $request){
        $request->validate([
            "name" => "required|min:5|unique:products,name",
            "description" => "required|min:50",
            "price" => "required|numeric|gt:0",
            "category" => "required",
            "image" => "mimes:jpg,jpeg"
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        if($request->hasFile("image")){
            $image = $request->file("image");
            $filename = time().".".$image->getClientOriginalExtension();
            $image->move(public_path("image"), $filename);
            File::delete(public_path($product->image_path));
            $product->image_path = "image/".$filename;
        }
        $product->save();

        return redirect()->route("product.show");
    }

}
