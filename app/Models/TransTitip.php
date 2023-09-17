<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransTitip extends Model
{
    use HasFactory;

    protected $table = 'trans_titip';

    protected $guarded = [];

    // public function kendaraan(): BelongsTo
    // {
    //     return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id')->orderBy('merk')->orderBy('jenis');
    // }
}
