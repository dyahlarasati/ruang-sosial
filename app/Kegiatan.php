<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use SoftDeletes;
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $keyType = 'string';
    protected $fillable = [
        'id_kegiatan', 'id_tempat_kegiatan','nama_kegiatan', 'tanggal_kegiatan', 'waktu_kegiatan', 'foto_kegiatan'
    ];

    public function partisipasi_kegiatan()
    {
        return $this->hasMany(PartisipasiKegiatan::class, 'id_kegiatan', 'id_kegiatan');
    }

    public function tempat_kegiatan()
    {
        return $this->belongsTo(TempatKegiatan::class, 'id_tempat_kegiatan', 'id_tempat_kegiatan')->withTrashed();
    }

    public function getTanggalKegiatanAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_kegiatan'])
        ->translatedFormat('l, d F Y');
    }
}
