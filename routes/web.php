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


//檢視所有古物資料
Route::get('antiques',[AntiquesController::class, 'index'])->name('antiques.index');

//新增一筆古物資料
Route::get('antiques/create',[AntiquesController::class, 'create'])->name('antiques.create');

//修改一筆古物資料
Route::get('antiques/{id}/edit', [AntiquesController::class, 'edit'])->where('id','[0-9]+')->name('antiques.edit');

//檢視所有單一古物資料
Route::get('antiques/{id}', [AntiquesController::class, 'show'])->where('id','[0-9]+')->name('antiques.show');
