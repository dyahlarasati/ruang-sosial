<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TempatDonasi extends Model
{
    use SoftDeletes;
    protected $table = 'tempat_donasi';

    protected $primaryKey = 'id_tempat_donasi';
    protected $keyType = 'string';

    protected $fillable = [
        'id_tempat_donasi', 'nama_tempat_donasi','lokasi_donasi'
    ];

    protected $hidden = [

    ];

    public function aktivitas_donasi()
    {
        return $this->hasMany(AktivitasDonasi::class, 'id_tempat_donasi', 'id_tempat_donasi');
    }

}
