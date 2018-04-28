<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekendaraanRequest;
use App\Http\Requests\UpdatekendaraanRequest;
use App\Repositories\kendaraanRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\kecelakaan;

class kendaraanController extends Controller
{
    /** @var  kendaraanRepository */
    private $kendaraanRepository;

    public function __construct(kendaraanRepository $kendaraanRepo)
    {
        $this->kendaraanRepository = $kendaraanRepo;
        $this->kecelakaan = kecelakaan::pluck('no_lapangan','id');
    }

    /**
     * Display a listing of the kendaraan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kendaraanRepository->pushCriteria(new RequestCriteria($request));
        $kendaraans = $this->kendaraanRepository->all();

        return view('kendaraans.index')
            ->with('kendaraans', $kendaraans);

    }

    /**
     * Show the form for creating a new kendaraan.
     *
     * @return Response
     */
    public function create()
    {
        
        return view('kendaraans.create')
        ->with('kecelakaan',$this->kecelakaan);
    }

    /**
     * Store a newly created kendaraan in storage.
     *
     * @param CreatekendaraanRequest $request
     *
     * @return Response
     */
    public function store(CreatekendaraanRequest $request)
    {
        $input = $request->all();

        $kendaraan = $this->kendaraanRepository->create($input);

        Flash::success('Kendaraan saved successfully.');

        return redirect(route('kendaraans.index'));
    }

    /**
     * Display the specified kendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kendaraan = $this->kendaraanRepository->findWithoutFail($id);

        if (empty($kendaraan)) {
            Flash::error('Kendaraan not found');
            

            return redirect(route('kendaraans.index'));
        }

        return view('kendaraans.show')
        ->with('kendaraan', $kendaraan)
        ->with('kecelakaan', $this->kecelakaan);
    }

    /**
     * Show the form for editing the specified kendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kendaraan = $this->kendaraanRepository->findWithoutFail($id);

        if (empty($kendaraan)) {
            Flash::error('Kendaraan not found');

            return redirect(route('kendaraans.index'));
        }
        


        return view('kendaraans.edit')->with('kendaraan', $kendaraan);
    }

    /**
     * Update the specified kendaraan in storage.
     *
     * @param  int              $id
     * @param UpdatekendaraanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekendaraanRequest $request)
    {
        $kendaraan = $this->kendaraanRepository->findWithoutFail($id);

        if (empty($kendaraan)) {
            Flash::error('Kendaraan not found');

            return redirect(route('kendaraans.index'));
        }

        $kendaraan = $this->kendaraanRepository->update($request->all(), $id);

        Flash::success('Kendaraan updated successfully.');

        return redirect(route('kendaraans.index'));
    }

    /**
     * Remove the specified kendaraan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kendaraan = $this->kendaraanRepository->findWithoutFail($id);

        if (empty($kendaraan)) {
            Flash::error('Kendaraan not found');

            return redirect(route('kendaraans.index'));
        }

        $this->kendaraanRepository->delete($id);

        Flash::success('Kendaraan deleted successfully.');

        return redirect(route('kendaraans.index'));
    }
}
