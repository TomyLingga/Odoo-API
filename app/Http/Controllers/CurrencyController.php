<?php

namespace App\Http\Controllers;

use App\Models\ResCurrency;
use App\Models\ResCurrencyRate;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CurrencyController extends Controller
{
    public function index_currency()
    {
        $CurrencyData = ResCurrency::get();

        if ($CurrencyData->isEmpty()) {
            return response()->json([
                'message' => "No Currencies Found",
                'success' => false,
                'code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $CurrencyData,
            'message' => 'Currencies Retrieved Successfully',
            'code' => 200,
            'success' => true,
        ], 200);
    }

    public function index_currency_rate()
    {
        $CurrencyData = ResCurrencyRate::get();

        if ($CurrencyData->isEmpty()) {
            return response()->json([
                'message' => "No Currencies Found",
                'success' => false,
                'code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $CurrencyData,
            'message' => 'Currencies Retrieved Successfully',
            'code' => 200,
            'success' => true,
        ], 200);
    }

    public function show_currency($id)
    {
        try {
            $CurrencyData = ResCurrency::with('currency_rate')->findOrFail($id);

            return response()->json([
                'data' => $CurrencyData,
                'message' => 'Currency Retrieved Successfully',
                'code' => 200,
                'success' => true,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Currency Not Found',
                'success' => true,
                'code' => 401
            ], 401);
        }
    }

    public function show_currency_rate($id)
    {
        try {
            $CurrencyData = ResCurrencyRate::findOrFail($id);

            return response()->json([
                'data' => $CurrencyData,
                'message' => 'Currency Rate Retrieved Successfully',
                'code' => 200,
                'success' => true,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Currency Rate Not Found',
                'success' => true,
                'code' => 401
            ], 401);
        }
    }

    public function get_date_currency(Request $request){

        try {
            $CurrencyData = ResCurrency::where('name', $request->get('mata_uang'))->firstOrFail();
            $tanggal = $request->get('tanggal');
            $date = Carbon::parse($tanggal);

            $rates = ResCurrencyRate::where('currency_id', $CurrencyData->id)
            ->whereYear('name', $date->year)
            ->whereMonth('name', $date->month)
            ->orderBy('name')
            ->get();
            //dd($rates);
            return response()->json([
                'data' => $rates,
                'message' => 'Currency Rate Retrieved Successfully',
                'code' => 200,
                'success' => true,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Currency Rate Not Found',
                'success' => true,
                'code' => 401
            ], 401);
        }
    }

    public function get_except_idr(){

        try {

            $rates = ResCurrency::where('name', '!=', 'IDR')
            ->get();
            //dd($rates);
            return response()->json([
                'data' => $rates,
                'message' => 'Currency Rate Retrieved Successfully',
                'code' => 200,
                'success' => true,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Currency Rate Not Found',
                'success' => true,
                'code' => 401
            ], 401);
        }
    }

}
