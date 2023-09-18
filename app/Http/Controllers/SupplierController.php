<?php

namespace App\Http\Controllers;

use App\Models\ResPartner;

class SupplierController extends Controller
{
    public function index()
    {
        $SupplierData = ResPartner::where('supplier_rank', '>', 0)
                                ->get();

        if ($SupplierData->isEmpty()) {
            return response()->json([
                'message' => "No Suppliers Found",
                'success' => false,
                'code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $SupplierData,
            'message' => 'Suppliers Retrieved Successfully',
            'code' => 200,
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        try {
            $SupplierData = ResPartner::where('supplier_rank', '>', 0)->findOrFail($id);

            return response()->json([
                'data' => $SupplierData,
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
