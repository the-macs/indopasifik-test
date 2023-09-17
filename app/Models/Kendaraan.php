<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'm_kendaraan';

    protected $guarded = [];

    // public function kendaraanTitip(): HasMany
    // {
    //     return $this->hasMany(TransTitip::class, 'id_kendaraan', 'id');
    // }
}
