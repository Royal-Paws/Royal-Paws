<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Rutas Publicas
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/categorias', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/categorias/{category_urlP}',[App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/categorias/{category_urlP}/{product_urlp}',[App\Http\Controllers\Frontend\FrontendController::class, 'productView']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas Clientes (Para estas rutas se necesita iniciar sesión)
Route::middleware(['auth'])->group(function (){

    Route::get('/carrito',[App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('/proceso-pago',[App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::post('/proceso-pago',[App\Http\Controllers\VentaController::class, 'store']);
    //Route::get('/paypal/process/', [App\Http\Controllers\Payments\PaypalCardController::class, 'process']);
    Route::get('/paypal/process/{orderId}', [App\Http\Controllers\Payments\PaypalCardController::class, 'process']);
    Route::get('/compras', [App\Http\Controllers\VentaController::class, 'index']);

});

//Ruta Gracias
Route::get('/gracias',[App\Http\Controllers\Frontend\FrontendController::class, 'gracias']);



//Rutas Administrador
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    //Ruta Dashboard
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    
    //Rutas Sliders
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function(){
        Route::get('/sliders','index');
        Route::get('/sliders/crear','create');
        Route::post('/sliders/crear','store');
        Route::get('/sliders/{slider}/editar','edit');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider}/eliminar', 'destroy');

    });

    //Rutas Categorias
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('/categoria','index');
        Route::get('/categoria/crear','create');
        Route::post('/categoria','store');
        Route::get('/categoria/{category}/editar','edit');
        Route::put('/categoria/{category}', 'update');


    });

    //Rutas Productos
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
        Route::get('/producto','index');
        Route::get('/producto/crear','create');
        Route::post('/producto','store');
        Route::get('/producto/{producto}/editar','edit');
        Route::put('/producto/{producto}', 'update');
        Route::get('/producto-imagen/{producto_imagen_id}/delete','destroyImage');
        Route::get('/producto/{producto_id}/delete', 'destroy');

    });

    //Rutas Ventas
    Route::controller(App\Http\Controllers\Admin\SalesController::class)->group(function(){
        Route::get('/compras', 'index');
        Route::put('/compras/{id}', 'update'); // Actualizar una venta
        Route::delete('/compras/{id}', 'destroy'); // Eliminar una venta
    });


});
