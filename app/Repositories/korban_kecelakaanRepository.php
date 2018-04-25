<?php

namespace App\Repositories;

use App\Models\korban_kecelakaan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class korban_kecelakaanRepository
 * @package App\Repositories
 * @version April 22, 2018, 12:32 am UTC
 *
 * @method korban_kecelakaan findWithoutFail($id, $columns = ['*'])
 * @method korban_kecelakaan find($id, $columns = ['*'])
 * @method korban_kecelakaan first($columns = ['*'])
*/
class korban_kecelakaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_kecelakaan',
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
        return korban_kecelakaan::class;
    }
}
