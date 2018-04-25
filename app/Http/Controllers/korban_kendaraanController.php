<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createkorban_kendaraanRequest;
use App\Http\Requests\Updatekorban_kendaraanRequest;
use App\Repositories\korban_kendaraanRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class korban_kendaraanController extends Controller
{
    /** @var  korban_kendaraanRepository */
    private $korbanKendaraanRepository;

    public function __construct(korban_kendaraanRepository $korbanKendaraanRepo)
    {
        $this->korbanKendaraanRepository = $korbanKendaraanRepo;
    }

    /**
     * Display a listing of the korban_kendaraan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->korbanKendaraanRepository->pushCriteria(new RequestCriteria($request));
        $korbanKendaraans = $this->korbanKendaraanRepository->all();

        return view('korban_kendaraans.index')
            ->with('korbanKendaraans', $korbanKendaraans);
    }

    /**
     * Show the form for creating a new korban_kendaraan.
     *
     * @return Response
     */
    public function create()
    {
        return view('korban_kendaraans.create');
    }

    /**
     * Store a newly created korban_kendaraan in storage.
     *
     * @param Createkorban_kendaraanRequest $request
     *
     * @return Response
     */
    public function store(Createkorban_kendaraanRequest $request)
    {
        $input = $request->all();

        $korbanKendaraan = $this->korbanKendaraanRepository->create($input);

        Flash::success('Korban Kendaraan saved successfully.');

        return redirect(route('korbanKendaraans.index'));
    }

    /**
     * Display the specified korban_kendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $korbanKendaraan = $this->korbanKendaraanRepository->findWithoutFail($id);

        if (empty($korbanKendaraan)) {
            Flash::error('Korban Kendaraan not found');

            return redirect(route('korbanKendaraans.index'));
        }

        return view('korban_kendaraans.show')->with('korbanKendaraan', $korbanKendaraan);
    }

    /**
     * Show the form for editing the specified korban_kendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $korbanKendaraan = $this->korbanKendaraanRepository->findWithoutFail($id);

        if (empty($korbanKendaraan)) {
            Flash::error('Korban Kendaraan not found');

            return redirect(route('korbanKendaraans.index'));
        }

        return view('korban_kendaraans.edit')->with('korbanKendaraan', $korbanKendaraan);
    }

    /**
     * Update the specified korban_kendaraan in storage.
     *
     * @param  int              $id
     * @param Updatekorban_kendaraanRequest $request
     *
     * @return Response
     */
    public function update($id, Updatekorban_kendaraanRequest $request)
    {
        $korbanKendaraan = $this->korbanKendaraanRepository->findWithoutFail($id);

        if (empty($korbanKendaraan)) {
            Flash::error('Korban Kendaraan not found');

            return redirect(route('korbanKendaraans.index'));
        }

        $korbanKendaraan = $this->korbanKendaraanRepository->update($request->all(), $id);

        Flash::success('Korban Kendaraan updated successfully.');

        return redirect(route('korbanKendaraans.index'));
    }

    /**
     * Remove the specified korban_kendaraan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $korbanKendaraan = $this->korbanKendaraanRepository->findWithoutFail($id);

        if (empty($korbanKendaraan)) {
            Flash::error('Korban Kendaraan not found');

            return redirect(route('korbanKendaraans.index'));
        }

        $this->korbanKendaraanRepository->delete($id);

        Flash::success('Korban Kendaraan deleted successfully.');

        return redirect(route('korbanKendaraans.index'));
    }
}
