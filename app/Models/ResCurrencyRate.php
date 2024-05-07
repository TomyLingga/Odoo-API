<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ResCurrencyRate extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';       //primary key nya apa

    protected $table = 'res_currency_rate';   // nama tabel nya apa

    protected $fillable = [             // nama nama kolomnya
        'name',
        'rate',
        'currency_id',
        'company_id',
        'create_uid',
        'create_date',
        'write_uid',
        'write_date'
    ];

    public function currency()
    {
        return $this->belongsTo(ResCurrency::class, 'currency_id');
    }

}
