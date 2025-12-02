<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'Stok';
    protected $primaryKey = 'id_stok';
    public $timestamps = false; 

    public function reagen()
    {
        return $this->belongsTo(Reagen::class, 'id_reagen', 'id_reagen');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang', 'id_gudang');
    }

    protected $casts = [
        'last_update' => 'datetime',
    ];
}