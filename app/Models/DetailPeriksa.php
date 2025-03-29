<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPeriksa extends Model
{
    //
    use HasFactory;

    protected $table = 'detail_periksa';

    protected $fillable = ['id_periksa', 'id_obat', 'jumlah'];

    // Relasi ke PERIKSA
    public function periksa()
    {
        return $this->belongsTo(Periksa::class, 'id_periksa');
    }

    // Relasi ke OBAT
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

}
