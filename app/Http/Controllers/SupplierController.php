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
        $SupplierData = ResPartner::where('supplier_rank', '>', 0)
                                ->findOrFail($id);

        if (!$SupplierData) {
            return response()->json([
                'message' => "No Supplier Found",
                'success' => true,
                'code' => 401
            ], 401);
        }

        return response()->json([
            'data' => $SupplierData,
            'message' => 'Supplier Retrieved Successfully',
            'code' => 200,
            'success' => true,
        ], 200);
    }
}
