<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pasal
 * @package App\Models
 * @version April 22, 2018, 12:20 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection pelanggarans
 * @property \Illuminate\Database\Eloquent\Collection petugasKecelakaans
 * @property string nama_pasal
 * @property string bunyi_pasal
 * @property string jenis_pelanggaran
 */
class pasal extends Model
{
    // use SoftDeletes;

    public $table = 'pasals';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'no',
        'ayat',
        'bunyi_pasal',
        'jenis_pelanggaran'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no' => 'integer',
        'ayat' => 'string',
        'bunyi_pasal' => 'string',
        'jenis_pelanggaran' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function tilangs()
    {
        return $this->belongsToMany(\App\Models\Tilang::class, 'pelanggarans');
    }
}
