<?php

namespace App\Http\Controllers;

use App\Models\StockPicking;

class MaterialIssueSlipController extends Controller
{
    public function index()
    {
        $MISData = StockPicking::where('picking_type_id', 29)
                                ->get();

        if ($MISData->isEmpty()) {
            return response()->json([
                'message' => "MIS Not Found",
                'success' => true,
                'code' => 401
            ], 401);
        }

        return response()->json([
            'data' => $MISData,
            'message' => 'MIS Retrieved Successfully',
            'code' => 200,
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        try {
            $MISData = StockPicking::where('picking_type_id', 29)->findOrFail($id);

            return response()->json([
                'data' => $MISData,
                'message' => 'MIS Retrieved Successfully',
                'code' => 200,
                'success' => true,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'MIS Not Found',
                'success' => true,
                'code' => 401
            ], 401);
        }
    }
}
