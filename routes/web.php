<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasMasukController;
use App\Http\Controllers\KasKeluarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function()  {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::group(['prefix' => 'user'], function(){
        Route::get('/index', [UserController::class, 'index'])->name('user');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('/updateStat/{id}', [UserController::class, 'updateStat'])->name('userStat');
    });
    
    
    Route::group(['prefix' => 'kas_masuk'], function(){
        Route::get('/', [KasMasukController::class, 'index'])->name('kasmasuk');
        Route::get('/create', [KasMasukController::class, 'create'])->name('kasmasukcreate');
        Route::post('/store', [KasMasukController::class, 'store'])->name('kasmasukstore');
        Route::get('/show/{id}', [KasMasukController::class, 'show'])->name('kasmasukshow');
        Route::get('/edit/{id}', [KasMasukController::class, 'edit'])->name('kasmasukedit');
        Route::post('/update/{id}', [KasMasukController::class, 'update'])->name('kasmasukupdate');
        Route::get('/destroy/{id}', [KasMasukController::class, 'destroy'])->name('kasmasukdestroy');
    });

    Route::group(['prefix' => 'kas_keluar'], function(){
        Route::get('/', [KasKeluarController::class, 'index'])->name('kaskeluar');
        Route::get('/create', [KasKeluarController::class, 'create'])->name('kaskeluarcreate');
        Route::post('/store', [KasKeluarController::class, 'store'])->name('kaskeluarstore');
        Route::get('/show/{id}', [KasKeluarController::class, 'show'])->name('kaskeluarshow');
        Route::get('/edit/{id}', [KasKeluarController::class, 'edit'])->name('kaskeluaredit');
        Route::post('/update/{id}', [KasKeluarController::class, 'update'])->name('kaskeluarupdate');
        Route::get('/destroy/{id}', [KasKeluarController::class, 'destroy'])->name('kaskeluardestroy');
    });

    Route::group(['prefix' => 'laporan'],function(){
        Route::group(['prefix' => 'kasmasuk'],function(){
            Route::get('/', [LaporanController::class, 'kasmasuk'])->name('laporankasmasuk');
            Route::get('/print', [LaporanController::class, 'printkasmasuk'])->name('printkasmasuk');
        });

        Route::group(['prefix' => 'kaskeluar'],function(){
            Route::get('/', [LaporanController::class, 'kaskeluar'])->name('laporankaskeluar');
            Route::get('/print', [LaporanController::class, 'printkaskeluar'])->name('printkaskeluar');
        });
    });
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/loginPost', [LoginController::class, 'authenticate'])->name('loginPost');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

