<?php

namespace App;

use App\AdminModel\AktivitasDonasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\UangMasuk;
use Carbon\Carbon;

class Donasi extends Model
{
    use SoftDeletes;
    protected $table = 'donasi';
    protected $primaryKey = 'id_donasi';
    protected $keyType = 'string';
    protected $fillable = [
        'id_donasi', 'user_id', 'nominal', 'status_verifikasi','foto_bukti', 'tanggal_donasi', 'id_aktivitas_donasi', 'nama_donatur'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function aktivitasdonasi()
    {
        return $this->belongsTo(AktivitasDonasi::class, 'id_aktivitas_donasi', 'id_aktivitas_donasi')->withTrashed();
    }

    public function uangmasuk()
    {
        return $this->hasOne(UangMasuk::class, 'id_donasi', 'id_donasi');
    }

    public function getTanggalDonasiAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_donasi'])
        ->translatedFormat('l, d F Y');
    }
}
