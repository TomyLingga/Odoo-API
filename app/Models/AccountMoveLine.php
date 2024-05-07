<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class AccountMoveLine extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'account_move_line';

    protected $fillable = [
        'move_id',
        'move_name',
        'date',
        'ref',
        'parent_state',
        'journal_id',
        'company_id',
        'company_currency_id',
        'account_id',
        'account_internal_type',
        'account_root_id',
        'sequence',
        'name',
        'quantity',
        'price_unit',
        'discount',
        'debit',
        'credit',
        'balance',
        'amount_currency',
        'price_subtotal',
        'price_total',
        'reconciled',
        'blocked',
        'date_maturity',
        'currency_id',
        'partner_id',
        'product_uom_id',
        'product_id',
        'reconcile_model_id',
        'payment_id',
        'statement_line_id',
        'statement_id',
        'tax_line_id',
        'tax_group_id',
        'tax_base_amount',
        'tax_exigible',
        'tax_repartition_line_id',
        'tax_audit',
        'amount_residual',
        'amount_residual_currency',
        'full_reconcile_id',
        'analytic_account_id',
        'display_type',
        'is_rounding_line',
        'create_uid',
        'create_date',
        'write_uid',
        'write_date',
        'expected_pay_date',
        'internal_note',
        'next_action_date',
        'asset_id',
        'followup_line_id',
        'followup_date',
        'is_anglo_saxon_line',
        'purchase_line_id',
        'is_landed_costs_line',
        'expense_id',
        'approval_request_id',
        'fund_settlement_id',
        'stock_move_id'
    ];

    public function account_account(){

        return $this->belongsTo(AccountAccount::class, 'account_id');
    }
}
