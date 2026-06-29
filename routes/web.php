<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\ArrivalController;
use App\Http\Controllers\ArrivalDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])
        ->name('categories.index');
    Route::post('/store', [CategoryController::class, 'store'])
        ->name('categories.store');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])
        ->name('categories.edit');
    Route::put('/update/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');
    Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.delete');
})->middleware(['auth','verified']);

Route::prefix('products')->group(function () {

    Route::get('/', [ProductController::class, 'index'])
        ->name('products.index');


    Route::post('/store', [ProductController::class, 'store'])
        ->name('products.store');


    Route::put('/update/{product}', [ProductController::class, 'update'])
        ->name('products.update');


    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])
        ->name('products.delete');

    // Stock Movements
    Route::get('/stock-movements',
        [StockMovementController::class, 'index']
    )->name('stock.movements.index');

})->middleware(['auth','verified']);

Route::get('/a', [StockMovementController::class, 'index'])->name('a');
Route::post('/stock-movements/store',
    [StockMovementController::class,'store']
)
    ->name('stock-movements.store');

Route::get('/alerts', [AlertController::class, 'index'])
    ->name('alerts.index');


//Route::prefix('stock-movement')->group(function () {
//    Route::get('/', [StockMovementController::class, 'index'])->name('stock-movement');
//});


Route::prefix('suppliers')->group(function(){


    Route::get('/',
        [SupplierController::class,'index'])
        ->name('suppliers.index');


    Route::post('/store',
        [SupplierController::class,'store'])
        ->name('suppliers.store');


    Route::put('/update/{supplier}',
        [SupplierController::class,'update'])
        ->name('suppliers.update');


    Route::delete('/delete/{supplier}',
        [SupplierController::class,'destroy'])
        ->name('suppliers.delete');


});



Route::prefix('customers')->group(function(){


    Route::get('/',
        [CustomerController::class,'index'])
        ->name('customers.index');



    Route::post('/store',
        [CustomerController::class,'store'])
        ->name('customers.store');



    Route::put('/update/{customer}',
        [CustomerController::class,'update'])
        ->name('customers.update');



    Route::delete('/delete/{customer}',
        [CustomerController::class,'destroy'])
        ->name('customers.delete');


});




// ==========================
// ARRIVALS
// ==========================


Route::prefix('arrivals')
    ->middleware(['auth','verified'])
    ->group(function () {


        Route::get('/',
            [ArrivalController::class,'index'])
            ->name('arrivals.index');


        Route::post('/store',
            [ArrivalController::class,'store'])
            ->name('arrivals.store');


        Route::put('/update/{arrival}',
            [ArrivalController::class,'update'])
            ->name('arrivals.update');


        Route::delete('/delete/{arrival}',
            [ArrivalController::class,'destroy'])
            ->name('arrivals.delete');

        Route::get('/arrivals/{arrival}/details',
            [ArrivalController::class,'details'])
            ->name('arrivals.details');


    });





// ==========================
// ARRIVAL DETAILS
// ==========================


Route::get('/arrival-details',
    [ArrivalDetailController::class,'index'])
    ->middleware(['auth','verified'])
    ->name('arrival-details.index');

Route::get('sale-detail',[SaleDetailController::class,'index'])->name('sale-detail');

Route::prefix('sales')->group(function(){



    Route::get('/show', [SaleController::class, 'show'])
        ->name('sales.show');


    Route::get('/',
        [SaleController::class,'index'])
        ->name('sales.index');



    Route::post('/store',
        [SaleController::class,'store'])
        ->name('sales.store');



    Route::get('/{sale}/details',
        [SaleController::class,'details'])
        ->name('sales.details');



    Route::delete('/delete/{sale}',
        [SaleController::class,'destroy'])
        ->name('sales.delete');




});


Route::prefix('users')
    ->middleware(['auth','verified'])
    ->group(function(){


        Route::get('/',
            [UserController::class,'index'])
            ->middleware('permission:users.view')
            ->name('users.index');



        Route::post('/store',
            [UserController::class,'store'])
            ->middleware('permission:users.create')
            ->name('users.store');



        Route::put('/update/{user}',
            [UserController::class,'update'])
            ->middleware('permission:users.edit')
            ->name('users.update');



        Route::delete('/delete/{user}',
            [UserController::class,'destroy'])
            ->middleware('permission:users.delete')
            ->name('users.delete');


    });



use App\Http\Controllers\RoleController;


Route::prefix('roles')
    ->middleware(['auth','verified'])
    ->group(function(){


        Route::get('/',
            [RoleController::class,'index'])
            ->name('roles.index');


        Route::post('/store',
            [RoleController::class,'store'])
            ->name('roles.store');


        Route::put('/update/{role}',
            [RoleController::class,'update'])
            ->name('roles.update');


        Route::delete('/delete/{role}',
            [RoleController::class,'destroy'])
            ->name('roles.delete');


        Route::put('/permissions/{role}',
            [RoleController::class,'permissions'])
            ->name('roles.permissions');


    });


Route::prefix('roles')
    ->middleware(['auth','verified'])
    ->group(function () {


        Route::get('/',
            [RoleController::class,'index'])
            ->name('roles.index');



        Route::put('/{role}/permissions',
            [RoleController::class,'updatePermissions'])
            ->name('roles.permissions.update');


    });


//Route::get('/test-language', function(){
//
//    return app()->getLocale();
//
//});


Route::get('/language/{locale}', function ($locale) {


    if(in_array($locale, ['en','fr'])){


        session()->put('locale', $locale);


    }


    return back();


})->name('language.switch');



Route::get('/settings', [SettingController::class,'index'])
    ->name('settings.index');
//
Route::get('/settings/company', [SettingController::class,'company'])
    ->name('company.settings');

Route::get('settings/about', [AboutController::class,'index'])
    ->name('about.index');








require __DIR__.'/auth.php';
