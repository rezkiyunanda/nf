<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class korban_kendaraan
 * @package App\Models
 * @version April 22, 2018, 12:31 am UTC
 *
 * @property \App\Models\Kendaraan kendaraan
 * @property \Illuminate\Database\Eloquent\Collection pelanggarans
 * @property \Illuminate\Database\Eloquent\Collection petugasKecelakaans
 * @property integer no_plat
 * @property string nama
 * @property string jenis_kelamin
 * @property string umur
 * @property string kondisi
 */
class korban_kendaraan extends Model
{
    //  use SoftDeletes;

    public $table = 'korban_kendaraans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_plat',
        'nama',
        'jenis_kelamin',
        'umur',
        'kondisi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no_ktp' => 'integer',
        'no_plat' => 'integer',
        'nama' => 'string',
        'jenis_kelamin' => 'string',
        'umur' => 'string',
        'kondisi' => 'string'
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
    public function kendaraan()
    {
        return $this->belongsTo(\App\Models\Kendaraan::class);
    }
}
