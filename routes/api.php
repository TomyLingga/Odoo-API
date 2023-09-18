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

Route::fallback(function () {
    return response()->json(['code' => 404, 'message' => 'URL not Found'], 404);
});
