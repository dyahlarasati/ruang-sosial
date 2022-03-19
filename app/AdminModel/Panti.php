<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Panti extends Model
{
    use SoftDeletes;
    protected $table = 'panti';

    protected $primaryKey = 'id_panti';
    protected $keyType = 'string';

    protected $fillable = [
        'id_panti', 'nama_panti'
    ];


    public function tunawisma()
    {
        return $this->hasMany(Tunawisma::class, 'id_panti', 'id_panti');
    }
}
