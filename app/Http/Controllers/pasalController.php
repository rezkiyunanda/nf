<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepasalRequest;
use App\Http\Requests\UpdatepasalRequest;
use App\Repositories\pasalRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class pasalController extends Controller 
{
    /** @var  pasalRepository */
    private $pasalRepository;

    public function __construct(pasalRepository $pasalRepo)
    {
        $this->pasalRepository = $pasalRepo;
    }

    /**
     * Display a listing of the pasal.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pasalRepository->pushCriteria(new RequestCriteria($request));
        $pasals = $this->pasalRepository->all();

        return view('pasals.index')
            ->with('pasals', $pasals);
    }

    /**
     * Show the form for creating a new pasal.
     *
     * @return Response
     */
    public function create()
    {
        return view('pasals.create');
    }

    /**
     * Store a newly created pasal in storage.
     *
     * @param CreatepasalRequest $request
     *
     * @return Response
     */
    public function store(CreatepasalRequest $request)
    {
        $input = $request->all();

        $pasal = $this->pasalRepository->create($input);

        Flash::success('Pasal saved successfully.');

        return redirect(route('pasals.index'));
    }

    /**
     * Display the specified pasal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pasal = $this->pasalRepository->findWithoutFail($id);

        if (empty($pasal)) {
            Flash::error('Pasal not found');

            return redirect(route('pasals.index'));
        }

        return view('pasals.show')->with('pasal', $pasal);
    }

    /**
     * Show the form for editing the specified pasal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pasal = $this->pasalRepository->findWithoutFail($id);

        if (empty($pasal)) {
            Flash::error('Pasal not found');

            return redirect(route('pasals.index'));
        }

        return view('pasals.edit')->with('pasal', $pasal);
    }

    /**
     * Update the specified pasal in storage.
     *
     * @param  int              $id
     * @param UpdatepasalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepasalRequest $request)
    {
        $pasal = $this->pasalRepository->findWithoutFail($id);

        if (empty($pasal)) {
            Flash::error('Pasal not found');

            return redirect(route('pasals.index'));
        }

        $pasal = $this->pasalRepository->update($request->all(), $id);

        Flash::success('Pasal updated successfully.');

        return redirect(route('pasals.index'));
    }

    /**
     * Remove the specified pasal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pasal = $this->pasalRepository->findWithoutFail($id);

        if (empty($pasal)) {
            Flash::error('Pasal not found');

            return redirect(route('pasals.index'));
        }

        $this->pasalRepository->delete($id);

        Flash::success('Pasal deleted successfully.');

        return redirect(route('pasals.index'));
    }
}
