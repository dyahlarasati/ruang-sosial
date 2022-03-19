<?php

namespace App\AdminModel;

use App\Donasi;
use App\AdminModel\TempatDonasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AktivitasDonasi extends Model
{
    use SoftDeletes;
    protected $table = 'aktivitas_donasi';
    protected $primaryKey = 'id_aktivitas_donasi';
    protected $keyType = 'string';
    protected $fillable = [
        'id_aktivitas_donasi','id_tempat_donasi','foto_aktivitas', 'kontak_koordinator'
    ];

    public function donasi()
    {
        return $this->hasMany(Donasi::class, 'id_aktivitas_donasi', 'id_aktivitas_donasi');
    }

    public function tempat_donasi()
    {
        return $this->belongsTo(TempatDonasi::class, 'id_tempat_donasi', 'id_tempat_donasi')->withTrashed();
    }
}
