<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'Transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false; 

    protected $fillable = [
        'id_reagen', 
        'id_gudang', 
        'jenis_transaksi', 
        'jumlah', 
        'keterangan'
    ];

    public function reagen()
    {
        return $this->belongsTo(Reagen::class, 'id_reagen', 'id_reagen');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang', 'id_gudang');
    }

    protected $casts = [
        'tanggal' => 'datetime',
    ];
}