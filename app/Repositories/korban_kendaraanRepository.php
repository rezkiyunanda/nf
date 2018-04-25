<?php

namespace App\Repositories;

use App\Models\korban_kendaraan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class korban_kendaraanRepository
 * @package App\Repositories
 * @version April 22, 2018, 12:31 am UTC
 *
 * @method korban_kendaraan findWithoutFail($id, $columns = ['*'])
 * @method korban_kendaraan find($id, $columns = ['*'])
 * @method korban_kendaraan first($columns = ['*'])
*/
class korban_kendaraanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_plat',
        'nama',
        'jenis_kelamin',
        'umur',
        'kondisi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return korban_kendaraan::class;
    }
}
