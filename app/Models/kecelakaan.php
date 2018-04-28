<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;

/**
 * Class kecelakaan
 * @package App\Models
 * @version April 22, 2018, 12:30 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Kendaraan
 * @property \Illuminate\Database\Eloquent\Collection KorbanKecelakaan
 * @property \Illuminate\Database\Eloquent\Collection pelanggarans
 * @property \Illuminate\Database\Eloquent\Collection petugasKecelakaans
 * @property integer no_lapangan
 * @property string keterangan_lokasi
 * @property integer total_kerugian
 */
class kecelakaan extends Model
{
    // use SoftDeletes;
    use PostgisTrait;

    public $table = 'kecelakaans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_lapangan',
        'keterangan_lokasi',
        'total_kerugian',
        'geom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    protected $postgisFields = [
        'geom'
    ];

    protected $postgisTypes = [
        'geom' => [
            'geomtype' => 'geometry',
            'srid' => 0
        ]
    ];

    protected $casts = [
        'id' => 'integer',
        'no_lapangan' => 'integer',
        'keterangan_lokasi' => 'string',
        'total_kerugian' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kendaraans()
    {
        return $this->hasMany(\App\Models\Kendaraan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function korbanKecelakaans()
    {
        return $this->hasMany(\App\Models\KorbanKecelakaan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'petugas_kecelakaans');
    }
}
