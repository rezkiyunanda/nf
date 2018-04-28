<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tilang
 * @package App\Models
 * @version April 27, 2018, 3:43 pm UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\JenisKendaraan jenisKendaraan
 * @property \Illuminate\Database\Eloquent\Collection pelanggarans
 * @property integer petugas_id
 * @property integer no_sim
 * @property integer no_stnk
 * @property integer merek
 * @property integer jenis_kendaraan_id
 * @property string nama_pelanggar
 * @property string keterangan
 * @property integer no_plat
 */
class tilang extends Model
{
    // use SoftDeletes;

    public $table = 'tilangs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'petugas_id',
        'no_sim',
        'no_stnk',
        'merek',
        'jenis_kendaraan_id',
        'nama_pelanggar',
        'keterangan',
        'no_plat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'petugas_id' => 'integer',
        'no_sim' => 'integer',
        'no_stnk' => 'integer',
        'merek' => 'integer',
        'jenis_kendaraan_id' => 'integer',
        'nama_pelanggar' => 'string',
        'keterangan' => 'string',
        'no_plat' => 'integer'
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisKendaraan()
    {
        return $this->belongsTo(\App\Models\JenisKendaraan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function pasals()
    {
        return $this->belongsToMany(\App\Models\Pasal::class, 'pelanggarans');
    }
}
