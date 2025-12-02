<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reagen extends Model
{
    use HasFactory;

    protected $table = 'Reagen';
    protected $primaryKey = 'id_reagen';
    public $timestamps = false; 

    protected $fillable = [
        'kode_reagen', 
        'nama_reagen', 
        'kategori', 
        'satuan', 
        'stok_minimum'
    ];
    
    public function stok()
    {
        return $this->hasMany(Stok::class, 'id_reagen', 'id_reagen');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_reagen', 'id_reagen');
    }
}