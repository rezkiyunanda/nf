<?php

namespace App\Repositories;

use App\Models\kendaraan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kendaraanRepository
 * @package App\Repositories
 * @version April 22, 2018, 12:31 am UTC
 *
 * @method kendaraan findWithoutFail($id, $columns = ['*'])
 * @method kendaraan find($id, $columns = ['*'])
 * @method kendaraan first($columns = ['*'])
*/
class kendaraanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_kecelakaan',
        'nama',
        'alamat',
        'umur',
        'sim',
        'status_disita',
        'id_merk',
        'kondisi_kendaraan',
        'jenis_kendaraan',
        'status_kerugian',
        'no_reg_bb',
        'kerugian',
        'status_1'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kendaraan::class;
    }
}
