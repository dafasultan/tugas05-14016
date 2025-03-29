<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model
{
    //
    use HasFactory;

    protected $table = 'obat';

    protected $fillable = ['nama_obat', 'harga'];

    // Relasi ke DETAIL_PERIKSA
    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat');
    }

}
