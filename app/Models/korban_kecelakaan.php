<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class korban_kecelakaan
 * @package App\Models
 * @version April 22, 2018, 12:32 am UTC
 *
 * @property \App\Models\Kecelakaan kecelakaan
 * @property \Illuminate\Database\Eloquent\Collection pelanggarans
 * @property \Illuminate\Database\Eloquent\Collection petugasKecelakaans
 * @property integer id_kecelakaan
 * @property string nama
 * @property string jenis_kelamin
 * @property string umur
 * @property string kondisi
 */
class korban_kecelakaan extends Model
{
      // use SoftDeletes;

    public $table = 'korban_kecelakaans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_kecelakaan',
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
        'id_kecelakaan' => 'integer',
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
    public function kecelakaan()
    {
        return $this->belongsTo(\App\Models\Kecelakaan::class);
    }
}
