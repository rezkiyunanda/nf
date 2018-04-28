<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kendaraan
 * @package App\Models
 * @version April 22, 2018, 12:31 am UTC
 *
 * @property \App\Models\Kecelakaan kecelakaan
 * @property \Illuminate\Database\Eloquent\Collection KorbanKendaraan
 * @property \Illuminate\Database\Eloquent\Collection pelanggarans
 * @property \Illuminate\Database\Eloquent\Collection petugasKecelakaans
 * @property integer id_kecelakaan
 * @property string nama
 * @property string alamat
 * @property string umur
 * @property string sim
 * @property string status_disita
 * @property string id_merk
 * @property string kondisi_kendaraan
 * @property string jenis_kendaraan
 * @property string status_kerugian
 * @property integer no_reg_bb
 * @property integer kerugian
 * @property string status_1
 */
class kendaraan extends Model
{
  // use SoftDeletes;

    public $table = 'kendaraans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_plat',
        'kecelakaan_id',
        'nama',
        'alamat',
        'umur',
        'sim',
        'status_disita',
        'merek',
        'kondisi_kendaraan',
        'jenis_kendaraan',
        'status_kerugian',
        'no_reg_bb',
        'kerugian',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no_plat' => 'integer',
        'kecelakaan_id' => 'integer',
        'nama' => 'string',
        'alamat' => 'string',
        'umur' => 'string',
        'sim' => 'string',
        'status_disita' => 'string',
        'merek' => 'string',
        'kondisi_kendaraan' => 'string',
        'jenis_kendaraan' => 'string',
        'status_kerugian' => 'string',
        'no_reg_bb' => 'integer',
        'kerugian' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kecelakaan()
    {
        return $this->belongsTo(\App\Models\Kecelakaan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function korbanKendaraans()
    {
        return $this->hasMany(\App\Models\KorbanKendaraan::class);
    }
}
