<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(){
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }

        $data = Category::all();

        return view("manage-category", ["categories" => $data, "login_token" => $is_user_logged_in, "role" => $role]);
    }

    public function showAdd(){
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }

        return view("add-category", ["login_token" => $is_user_logged_in, "role" => $role]);
    }

    public function addNewShow(Request $request){
        $validated = $request->validate([
            "category_name" => "required|min:2|unique:categories,name"
        ]);

        $category = new Category();
        $category->name = $request->category_name;
        $category->save();

        return redirect()->route("category.show");
    }

    public function deleteCategory(Category $category){
        $category->delete();
        return redirect()->route("category.show");
    }

    public function showEdit(Category $category){
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }

        return view("edit-category", ["category" => $category, "login_token" => $is_user_logged_in, "role" => $role]);
    }

    public function editCategory(Category $category, Request $request){
        $request->validate([
            "category_name" => "required|min:2|unique:categories,name"
        ]);

        $category->name = $request->category_name;
        $category->save();

        return redirect()->route("category.show");
    }
}
