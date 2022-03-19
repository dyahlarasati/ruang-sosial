<?php

namespace App\AdminModel;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tunawisma extends Model
{
    use SoftDeletes;
    protected $table = 'tunawisma';
    protected $primaryKey = 'id_tunawisma';
    protected $keyType = 'string';
    protected $fillable = [
        'id_tunawisma', 'id_panti', 'nama_tunawisma', 'tanggal_lahir','nama_orang_tua','keterangan_keluarga'
    ];

    public function panti()
    {
        return $this->belongsTo(Panti::class, 'id_panti', 'id_panti')->withTrashed();
    }

    public function getTanggalLahirAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])
        ->translatedFormat('l, d F Y');
    }
}
