<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroceriesController; // Importa el controlador
use App\Http\Controllers\ContactController; // Importa el controlador
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EmployeesController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', [siteController::class, 'index'])->name("home"); // name("home") es el nombre de la ruta
Route::get('/serv', [siteController::class, 'services'])->name("serv");
Route::get('/contact', [siteController::class, 'contact'])->name("contact");
Route::get('/products', [siteController::class, 'products'])->name("products");
*/
//retornar una vista
/*Route::get('/', function () {
    return view('index');
});*/


Route::get('/', [GroceriesController::class, 'index'])->name("home");
Route::get('/store/shop', [GroceriesController::class, 'shop'])->name("shop");
Route::get('/register', [GroceriesController::class, 'register'])->name("register");
Route::get('/login', [GroceriesController::class, 'login'])->name("login");
Route::get('/store/shop/product_details/{id}', [GroceriesController::class, 'product_details'])->name("details");
Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment.store');
Route::resource('contact', ContactController::class);

Route::get('/admin/products', [ProductsController::class, 'index'])->name("admin.products.index");

Route::get('/admin/employees', [EmployeesController::class, 'employees'])->name("admin.employees.index");

