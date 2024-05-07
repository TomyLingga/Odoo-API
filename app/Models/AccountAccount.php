<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class AccountAccount extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'account_account';

    protected $fillable = [
        'name',
        'currency_id',
        'code',
        'deprecated',
        'user_type_id',
        'internal_type',
        'internal_group',
        'reconcile',
        'note',
        'company_id',
        'group_id',
        'root_id',
        'create_uid',
        'create_date',
        'write_uid',
        'write_date',
        'asset_model',
        'create_asset',
        'is_down_payment_account'
    ];

    public function account_move_line(){

        return $this->hasMany(AccountMoveLine::class, 'account_id');
    }
}
