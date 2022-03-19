<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TempatKegiatan extends Model
{
    use SoftDeletes;
    protected $table = 'tempat_kegiatan';

    protected $primaryKey = 'id_tempat_kegiatan';
    protected $keyType = 'string';

    protected $fillable = [
        'id_tempat_kegiatan', 'nama_tempat_kegiatan'
    ];

    protected $hidden = [];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'id_tempat_kegiatan', 'id_tempat_kegiatan');
    }
}
