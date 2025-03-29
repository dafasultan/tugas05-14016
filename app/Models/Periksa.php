<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periksa extends Model
{
    //
    use HasFactory;

    protected $table = 'periksa';

    protected $fillable = ['id_pasien', 'id_dokter', 'tanggal_periksa', 'catatan', 'biaya'];

    // Relasi ke USER (pasien & dokter)
    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }
    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    // Relasi ke DETAIL_PERIKSA (resep obat)
    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }
}
