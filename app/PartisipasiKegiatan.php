<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use Carbon\Carbon;

class PartisipasiKegiatan extends Model
{
    use SoftDeletes;
    protected $table = 'partisipasi_kegiatan';
    protected $primaryKey = 'id_partisipasi_kegiatan';
    protected $keyType = 'string';
    protected $fillable = [
        'id_partisipasi_kegiatan',
        'user_id', 'id_kegiatan',
        'nama',
        'alasan',
        // 'lokasi_kegiatan',
        'status_verifikasi',
        'bukti_pengajuan',
        // 'tanggal_kegiatan_berlangsung',
        // 'waktu_kegiatan',
        'tanggal_partisipasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan', 'id_kegiatan')->withTrashed();
    }

    public function kegiatanmasuk()
    {
        return $this->hasOne(KegiatanMasuk::class, 'id_partisipasi_kegiatan', 'id_partisipasi_kegiatan');
    }

    public function kegiatansosial()
    {
        return $this->hasOne(PartisipasiKegiatan::class, 'id_partisipasi_kegiatan', 'id_partisipasi_kegiatan');
    }

    public function getTanggalKegiatanBerlangsungAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_kegiatan_berlangsung'])
        ->translatedFormat('l, d F Y');
    }
}
