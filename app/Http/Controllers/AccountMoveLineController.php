<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountMoveLine;
use App\Models\AccountAccount;
use Carbon\Carbon;

class AccountMoveLineController extends Controller
{
    public function index_accountmove(Request $request)
    {
        $tanggal = $request->get('tanggal');
        $date = Carbon::parse($tanggal);
        $AccountMoveData = AccountMoveLine::whereYear('date', $date->year)
                                            ->whereMonth('date', $date->month)
                                            ->with('account_account')
                                            ->orderBy('date')
                                            ->get();
        if ($AccountMoveData->isEmpty()) {
            return response()->json([
                'message' => "No Data Found",
                'success' => false,
                'code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $AccountMoveData,
            'message' => 'Data Retrieved Successfully',
            'code' => 200,
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        try {
            $AccountMoveData = AccountMoveLine::with('account_account')->findOrFail($id);

            return response()->json([
                'data' => $AccountMoveData,
                'message' => 'Data Retrieved Successfully',
                'code' => 200,
                'success' => true,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Data Not Found',
                'success' => true,
                'code' => 401
            ], 401);
        }
    }
}
