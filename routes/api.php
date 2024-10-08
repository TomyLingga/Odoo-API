<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'levelone.checker'], function () {
    //MIS
    Route::get('mis/index', [App\Http\Controllers\MaterialIssueSlipController::class, 'index']);
    Route::get('mis/get/{id}', [App\Http\Controllers\MaterialIssueSlipController::class, 'show']);
    //Supplier
    Route::get('supplier/index', [App\Http\Controllers\SupplierController::class, 'index']);
    Route::get('supplier/get/{id}', [App\Http\Controllers\SupplierController::class, 'show']);
});

//Currency
Route::get('currency/index', [App\Http\Controllers\CurrencyController::class, 'index_currency']);
Route::get('currency/get/{id}', [App\Http\Controllers\CurrencyController::class, 'show_currency']);
Route::get('currency/get-rate/{id}', [App\Http\Controllers\CurrencyController::class, 'show_currency_with_rate']);
Route::get('currency/ex-idr', [App\Http\Controllers\CurrencyController::class, 'get_except_idr']);
Route::get('currency_rate/index', [App\Http\Controllers\CurrencyController::class, 'index_currency_rate']);
Route::get('currency_rate/get/{id}', [App\Http\Controllers\CurrencyController::class, 'show_currency_rate']);
Route::post('currency_rate/period', [App\Http\Controllers\CurrencyController::class, 'get_date_currency']);
Route::post('currency_rate/latest', [App\Http\Controllers\CurrencyController::class, 'getLatestCurrency']);
//Account Move Line
Route::post('account_move_line/index', [App\Http\Controllers\AccountMoveLineController::class, 'index_accountmove']);
Route::post('account_move_line/posted', [App\Http\Controllers\AccountMoveLineController::class, 'indexPosted']);
Route::post('account_move_line/coa', [App\Http\Controllers\AccountMoveLineController::class, 'getByCoa']);
Route::get('account_move_line/get/{id}', [App\Http\Controllers\AccountMoveLineController::class, 'show']);

    Route::fallback(function () {
    return response()->json(['code' => 404, 'message' => 'URL not Found'], 404);
});
