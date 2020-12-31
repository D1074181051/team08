<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynastysController;
use App\Http\Controllers\AntiquesController;
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

Route::get('/', function () {
    return view('welcome');
});

//檢視所有朝代資料
Route::get('dynastys', [DynastysController::class, 'index'])->name('dynastys.index');
//新增一筆朝代資料
Route::get('dynastys/create', [DynastysController::class, 'create'])->name('dynastys.create');

//修改一筆朝代資料
Route::get('dynastys/{id}/edit', [DynastysController::class, 'edit'])->where('id','[0-9]+')->name('dynastys.edit');

//檢視所有單一朝代資料
Route::get('dynastys/{id}', [DynastysController::class, 'show'])->where('id','[0-9]+')->name('dynastys.show');

Route::post('dynastys/store', [DynastysController::class, 'store'])->name('dynastys.store');

Route::patch('dynastys/update/{id}', [DynastysController::class, 'update'])->name('dynastys.update');

Route::delete('dynastys/delete/{id}', [DynastysController::class, 'destroy'])->where('id','[0-9]+')->name('dynastys.destroy');


//檢視所有古物資料
Route::get('antiques',[AntiquesController::class, 'index'])->name('antiques.index');

//查詢小型古物資料
Route::get('antiques/small',[AntiquesController::class, 'small'])->name('antiques.small');

//選定收藏地查詢
Route::post('antiques/location', [AntiquesController::class, 'location'])->name('antiques.location');

//新增一筆古物資料
Route::get('antiques/create',[AntiquesController::class, 'create'])->name('antiques.create');

//修改一筆古物資料
Route::get('antiques/{id}/edit', [AntiquesController::class, 'edit'])->where('id','[0-9]+')->name('antiques.edit');

//檢視所有單一古物資料
Route::get('antiques/{id}', [AntiquesController::class, 'show'])->where('id','[0-9]+')->name('antiques.show');

Route::post('antiques/store', [AntiquesController::class, 'store'])->name('antiques.store');

Route::patch('antiques/update/{id}', [AntiquesController::class, 'update'])->name('antiques.update');

Route::delete('antiques/delete/{id}', [AntiquesController::class, 'destroy'])->where('id','[0-9]+')->name('antiques.destroy');

Route::get('/getCSRFToken', function () { return csrf_token();});
