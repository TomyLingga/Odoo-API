<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class StockPicking extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'stock_picking';

    protected $fillable = [
        'message_main_attachment_id',
        'name',
        'origin',
        'note',
        'backorder_id',
        'move_type',
        'state',
        'group_id',
        'priority',
        'scheduled_date',
        'date',
        'date_done',
        'location_dest_id',
        'picking_type_id',
        'partner_id',
        'company_id',
        'user_id',
        'owner_id',
        'printed',
        'is_locked',
        'immediate_transfer',
        'create_uid',
        'create_date',
        'write_uid',
        'write_date',
        'sale_id',
        'no_dokumen',
        'jenis_dokumen',
        'tanggal_dokumen',
        'currency_id',
        'no_aju',
        'tipe_kirim',
        'hs_code',
        'tanggal_aju',
        'tanggal_proses',
        'ref_picking_id',
        'tuj_pelabuhan',
        'no_do',
        'is_tank_farm',
        'scheduled_date_awal',
        'batch_id',
        'no_segel_bc',
        'add_no',
        'required_for',
        'section',
        'jenis_barang',
        'pengangkut_id',
        'checked_by_inspector_id',
        'checked_by_user_id',
        'checked_by_atasan_user_id',
        'received_by_id',
        'acknowledged_id',
        'no_dokumen_do',
        'syarat2_pengangkutan',
        'checked_by_material_control_id',
        'no_do_eks',
        'no_contract',
        'no_po',
        'no_wo',
        'file_name',
        'syarat_pengangkutan_id',
        'jenis_material',
        'no_izin_timbun',
        'invoice_state',
    ];
}
