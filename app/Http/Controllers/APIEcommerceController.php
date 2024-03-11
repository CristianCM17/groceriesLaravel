<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class APIEcommerceController extends Controller
{
    public function products () {
      //  $products = Product::all();
        $products = Product::with("category")->get();  //todos los productos union con lo de las categorias
        return response()->json($products);
  }

  public function products_dt (Request $request) {
    // Aquí se obtiene el valor del parámetro category de la solicitud entrante.
      $category= $request->input('category');
      $query= Product::query()->with('category');

      if ($category) {
          $query->whereHas('category', function($q) use ($category) {
               $q->where('name',$category);
          });
      }

      $products = $query->get();
      return response()->json(["data"=>$products]); //agregar la llave data para ajustarnos a lo qye nos pide datatable
}

}
