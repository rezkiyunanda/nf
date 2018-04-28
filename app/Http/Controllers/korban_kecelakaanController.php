<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createkorban_kecelakaanRequest;
use App\Http\Requests\Updatekorban_kecelakaanRequest;
use App\Repositories\korban_kecelakaanRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\kecelakaan;

class korban_kecelakaanController extends Controller
{
    /** @var  korban_kecelakaanRepository */
    private $korbanKecelakaanRepository;

    public function __construct(korban_kecelakaanRepository $korbanKecelakaanRepo)
    {
        $this->korbanKecelakaanRepository = $korbanKecelakaanRepo;
    }

    /**
     * Display a listing of the korban_kecelakaan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->korbanKecelakaanRepository->pushCriteria(new RequestCriteria($request));
        $korbanKecelakaans = $this->korbanKecelakaanRepository->all();

        return view('korban_kecelakaans.index')
            ->with('korbanKecelakaans', $korbanKecelakaans);
    }

    /**
     * Show the form for creating a new korban_kecelakaan.
     *
     * @return Response
     */
    public function create()
    {
        $kecelakaan = kecelakaan::pluck('no_lapangan','id');
        return view('korban_kecelakaans.create',compact('kecelakaan'));
    }

    /**
     * Store a newly created korban_kecelakaan in storage.
     *
     * @param Createkorban_kecelakaanRequest $request
     *
     * @return Response
     */
    public function store(Createkorban_kecelakaanRequest $request)
    {
        $input = $request->all();

        $korbanKecelakaan = $this->korbanKecelakaanRepository->create($input);

        Flash::success('Korban Kecelakaan saved successfully.');

        return redirect(route('korbanKecelakaans.index'));
    }

    /**
     * Display the specified korban_kecelakaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $korbanKecelakaan = $this->korbanKecelakaanRepository->findWithoutFail($id);

        if (empty($korbanKecelakaan)) {
            Flash::error('Korban Kecelakaan not found');

            return redirect(route('korbanKecelakaans.index'));
        }

        return view('korban_kecelakaans.show')->with('korbanKecelakaan', $korbanKecelakaan);
    }

    /**
     * Show the form for editing the specified korban_kecelakaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $korbanKecelakaan = $this->korbanKecelakaanRepository->findWithoutFail($id);

        if (empty($korbanKecelakaan)) {
            Flash::error('Korban Kecelakaan not found');

            return redirect(route('korbanKecelakaans.index'));
        }

        return view('korban_kecelakaans.edit')->with('korbanKecelakaan', $korbanKecelakaan);
    }

    /**
     * Update the specified korban_kecelakaan in storage.
     *
     * @param  int              $id
     * @param Updatekorban_kecelakaanRequest $request
     *
     * @return Response
     */
    public function update($id, Updatekorban_kecelakaanRequest $request)
    {
        $korbanKecelakaan = $this->korbanKecelakaanRepository->findWithoutFail($id);

        if (empty($korbanKecelakaan)) {
            Flash::error('Korban Kecelakaan not found');

            return redirect(route('korbanKecelakaans.index'));
        }

        $korbanKecelakaan = $this->korbanKecelakaanRepository->update($request->all(), $id);

        Flash::success('Korban Kecelakaan updated successfully.');

        return redirect(route('korbanKecelakaans.index'));
    }

    /**
     * Remove the specified korban_kecelakaan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $korbanKecelakaan = $this->korbanKecelakaanRepository->findWithoutFail($id);

        if (empty($korbanKecelakaan)) {
            Flash::error('Korban Kecelakaan not found');

            return redirect(route('korbanKecelakaans.index'));
        }

        $this->korbanKecelakaanRepository->delete($id);

        Flash::success('Korban Kecelakaan deleted successfully.');

        return redirect(route('korbanKecelakaans.index'));
    }
}
