<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\PartisipasiKegiatan;
use Carbon\Carbon;

class KegiatanMasuk extends Model
{
    use SoftDeletes;
    protected $table = 'kegiatan_masuk';
    protected $primaryKey = 'id_kegiatan_masuk';
    protected $keyType = 'string';
    protected $fillable = [
        'id_kegiatan_masuk', 'id_partisipasi_kegiatan',
        'tanggal_kegiatan_masuk'
    ];

    public function partisipasi()
    {
        return $this->belongsTo(PartisipasiKegiatan::class, 'id_partisipasi_kegiatan', 'id_partisipasi_kegiatan');
    }


}
