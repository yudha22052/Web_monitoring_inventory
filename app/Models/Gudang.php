<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $table = 'Gudang';
    protected $primaryKey = 'id_gudang';
    public $timestamps = false; 

    protected $fillable = [
        'nama_gudang', 
        'lokasi', 
        'is_pusat'
    ];

    public function stok()
    {
        return $this->hasMany(Stok::class, 'id_gudang', 'id_gudang');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_gudang', 'id_gudang');
    }
}