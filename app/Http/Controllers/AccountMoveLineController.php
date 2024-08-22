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

        // Calculate total debit and credit
        $totalDebit = $AccountMoveData->sum('debit');
        $totalCredit = $AccountMoveData->sum('credit');

        // Calculate the difference (debit - credit)
        $difference = $totalDebit - $totalCredit;

        return response()->json([
            'data' => $AccountMoveData,
            'total_debit' => $totalDebit,
            'total_credit' => $totalCredit,
            'difference' => $difference,
            'message' => 'Data Retrieved Successfully',
            'code' => 200,
            'success' => true,
        ], 200);
    }

    public function getByCoa(Request $request)
    {
        $tanggal = $request->get('tanggal');
        $coa = $request->get('coa');
        $date = Carbon::parse($tanggal);
        $AccountMoveData = AccountMoveLine::select(
                                        'id', 'move_id', 'move_name', 'date', 'ref', 'parent_state', 'name',
                                        'quantity', 'discount', 'debit', 'credit', 'balance', 'date_maturity',
                                        'amount_residual', 'amount_residual_currency', 'account_id'
                                    )
                                    ->whereYear('date', $date->year)
                                        ->whereMonth('date', $date->month)
                                    ->with('account_account')
                                    ->whereHas('account_account', function ($query) use ($coa) {
                                        $query->where('code', $coa);
                                    })
                                    ->where('parent_state', 'posted')
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

    public function indexPosted(Request $request)
    {
        $tanggal = $request->get('tanggal');
        $date = Carbon::parse($tanggal);

        $AccountMoveData = AccountMoveLine::select(
                'id', 'move_id', 'move_name', 'date', 'ref', 'parent_state', 'name',
                'quantity', 'discount', 'debit', 'credit', 'balance', 'date_maturity',
                'amount_residual', 'amount_residual_currency', 'account_id'
            )
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->where('parent_state', 'posted')
            ->with(['account_account' => function ($query) {
                $query->select(
                    'id', 'name', 'code'
                );
            }])
            ->orderBy('date')
            ->get();

        if ($AccountMoveData->isEmpty()) {
            return response()->json([
                'message' => "No Data Found",
                'success' => false,
                'code' => 404
            ], 404);
        }

        // Calculate total debit and credit
        $totalDebit = $AccountMoveData->sum('debit');
        $totalCredit = $AccountMoveData->sum('credit');

        // Calculate the difference (debit - credit)
        $difference = $totalDebit - $totalCredit;

        return response()->json([
            'data' => $AccountMoveData,
            'total_debit' => $totalDebit,
            'total_credit' => $totalCredit,
            'difference' => $difference,
            'message' => 'Data Retrieved Successfully',
            'code' => 200,
            'success' => true,
        ], 200);
    }
}
