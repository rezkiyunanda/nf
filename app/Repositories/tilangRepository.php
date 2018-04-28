<?php

namespace App\Repositories;

use App\Models\tilang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class tilangRepository
 * @package App\Repositories
 * @version April 27, 2018, 3:43 pm UTC
 *
 * @method tilang findWithoutFail($id, $columns = ['*'])
 * @method tilang find($id, $columns = ['*'])
 * @method tilang first($columns = ['*'])
*/
class tilangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return tilang::class;
    }
}
