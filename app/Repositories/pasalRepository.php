<?php

namespace App\Repositories;

use App\Models\pasal;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pasalRepository
 * @package App\Repositories
 * @version April 22, 2018, 12:20 am UTC
 *
 * @method pasal findWithoutFail($id, $columns = ['*'])
 * @method pasal find($id, $columns = ['*'])
 * @method pasal first($columns = ['*'])
*/
class pasalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_pasal',
        'bunyi_pasal',
        'jenis_pelanggaran'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pasal::class;
    }
}
