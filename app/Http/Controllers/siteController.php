<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class siteController extends Controller
{

  public function index (){

    $welcome= "welcome to my site";
                            //mandar valores a la vista
    return view('index', ["welcome_msg" => $welcome]);

  }

  public function services (){
    return view('services');
  }

  public function products (){
    return view('products');
  }

  public function contact (){
    return view('contact');
  }
}
