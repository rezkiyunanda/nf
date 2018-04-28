<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetilangRequest;
use App\Http\Requests\UpdatetilangRequest;
use App\Repositories\tilangRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class tilangController extends Controller
{
    /** @var  tilangRepository */
    private $tilangRepository;

    public function __construct(tilangRepository $tilangRepo)
    {
        $this->tilangRepository = $tilangRepo;
    }

    /**
     * Display a listing of the tilang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tilangRepository->pushCriteria(new RequestCriteria($request));
        $tilangs = $this->tilangRepository->all();

        return view('tilangs.index')
            ->with('tilangs', $tilangs);
    }

    /**
     * Show the form for creating a new tilang.
     *
     * @return Response
     */
    public function create()
    {
        return view('tilangs.create');
    }

    /**
     * Store a newly created tilang in storage.
     *
     * @param CreatetilangRequest $request
     *
     * @return Response
     */
    public function store(CreatetilangRequest $request)
    {
        $input = $request->all();

        $tilang = $this->tilangRepository->create($input);

        Flash::success('Tilang saved successfully.');

        return redirect(route('tilangs.index'));
    }

    /**
     * Display the specified tilang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tilang = $this->tilangRepository->findWithoutFail($id);

        if (empty($tilang)) {
            Flash::error('Tilang not found');

            return redirect(route('tilangs.index'));
        }

        return view('tilangs.show')->with('tilang', $tilang);
    }

    /**
     * Show the form for editing the specified tilang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tilang = $this->tilangRepository->findWithoutFail($id);

        if (empty($tilang)) {
            Flash::error('Tilang not found');

            return redirect(route('tilangs.index'));
        }

        return view('tilangs.edit')->with('tilang', $tilang);
    }

    /**
     * Update the specified tilang in storage.
     *
     * @param  int              $id
     * @param UpdatetilangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetilangRequest $request)
    {
        $tilang = $this->tilangRepository->findWithoutFail($id);

        if (empty($tilang)) {
            Flash::error('Tilang not found');

            return redirect(route('tilangs.index'));
        }

        $tilang = $this->tilangRepository->update($request->all(), $id);

        Flash::success('Tilang updated successfully.');

        return redirect(route('tilangs.index'));
    }

    /**
     * Remove the specified tilang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tilang = $this->tilangRepository->findWithoutFail($id);

        if (empty($tilang)) {
            Flash::error('Tilang not found');

            return redirect(route('tilangs.index'));
        }

        $this->tilangRepository->delete($id);

        Flash::success('Tilang deleted successfully.');

        return redirect(route('tilangs.index'));
    }
}
