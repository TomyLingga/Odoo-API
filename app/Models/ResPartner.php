<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ResPartner extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'res_partner';

    protected $fillable = [
        'name',
        'company_id',
        'create_date',
        'display_name',
        'date',
        'title',
        'parent_id',
        'ref',
        'lang',
        'tz',
        'user_id',
        'vat',
        'website',
        'comment',
        'credit_limit',
        'active',
        'employee',
        'function',
        'type',
        'street',
        'street2',
        'zip',
        'city',
        'state_id',
        'country_id',
        'partner_latitude',
        'partner_longitude',
        'email',
        'phone',
        'mobile',
        'is_company',
        'industry_id',
        'color',
        'partner_share',
        'commercial_partner_id',
        'commercial_company_name',
        'company_name',
        'create_uid',
        'write_uid',
        'write_date',
        'message_main_attachment_id',
        'email_normalized',
        'message_bounce',
        'contact_address_complete',
        'signup_token',
        'signup_type',
        'signup_expiration',
        'phone_sanitized',
        'debit_limit',
        'last_time_entries_checked',
        'invoice_warn',
        'invoice_warn_msg',
        'supplier_rank',
        'customer_rank',
        'online_partner_vendor_name',
        'online_partner_bank_account',
        'l10n_id_pkp',
        'l10n_id_nik',
        'l10n_id_tax_address',
        'l10n_id_tax_name',
        'l10n_id_kode_transaksi',
        'picking_warn',
        'picking_warn_msg',
        'team_id',
        'sale_warn',
        'sale_warn_msg',
        'purchase_warn',
        'purchase_warn_msg',
        'ocn_token',
        'tanggal_registrasi',
        'tanggal_expired',
        'pic',
        'fax',
        'purchase_type',
        'pagu',
        'is_distributor'
    ];
}
