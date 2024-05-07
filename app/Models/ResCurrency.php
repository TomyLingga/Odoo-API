<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ResCurrency extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';       //primary key nya apa

    protected $table = 'res_currency';   // nama tabel nya apa

    protected $fillable = [             // nama nama kolomnya
        'name',
        'symbol',
        'rounding',
        'decimal_places',
        'active',
        'position',
        'currency_unit_label',
        'currency_subunit_label',
        'create_uid',
        'create_date',
        'write_uid',
        'write_date'
    ];

    public function currency_rate(){

        return $this->hasMany(ResCurrencyRate::class, 'currency_id');
    }
}


