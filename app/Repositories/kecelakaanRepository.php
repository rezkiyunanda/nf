<?php

namespace App\Repositories;

use App\Models\kecelakaan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kecelakaanRepository
 * @package App\Repositories
 * @version April 22, 2018, 12:30 am UTC
 *
 * @method kecelakaan findWithoutFail($id, $columns = ['*'])
 * @method kecelakaan find($id, $columns = ['*'])
 * @method kecelakaan first($columns = ['*'])
*/
class kecelakaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_lapangan',
        'keterangan_lokasi',
        'total_kerugian'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kecelakaan::class;
    }
}
