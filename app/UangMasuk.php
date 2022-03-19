<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Donasi;
use Carbon\Carbon;

class UangMasuk extends Model
{
    use SoftDeletes;
    protected $table = 'uang_masuk';
    protected $primaryKey = 'id_uang_masuk';
    protected $keyType = 'string';
    protected $fillable = [
        'id_uang_masuk', 'id_donasi', 'nominal', 'tanggal_masuk'
    ];

    public function donasi()
    {
        return $this->belongsTo(Donasi::class, 'id_donasi', 'id_donasi');
    }
}
