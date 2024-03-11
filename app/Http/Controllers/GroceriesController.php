<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class GroceriesController extends Controller
{
   public function index(){

     

    return view("groceries.index");
   }

   public function shop(){
      $products= Product::all();
      $categories= Category::all();
    return view("groceries.shop",compact('products','categories'));
   }

   public function register(){
    return view("groceries.register");
   }

   public function login(){
    return view("groceries.login");
   }

   public function product_details($id){
         // Busca el producto por su ID
      $products = Product::find($id);
      $comments=Comment::where(['product_id'=> $id])->get();

      return view("groceries.product_details", compact('products', 'comments'));
   }

  




}
