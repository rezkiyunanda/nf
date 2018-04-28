<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekecelakaanRequest;
use App\Http\Requests\UpdatekecelakaanRequest;
use App\Models\kecelakaan;
use App\Repositories\kecelakaanRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class kecelakaanController extends Controller
{
    /** @var  kecelakaanRepository */
    private $kecelakaanRepository;

    public function __construct(kecelakaanRepository $kecelakaanRepo)
    {
        $this->kecelakaanRepository = $kecelakaanRepo;
    }

    /**
     * Display a listing of the kecelakaan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kecelakaanRepository->pushCriteria(new RequestCriteria($request));
        $kecelakaans = $this->kecelakaanRepository->all();

        return view('kecelakaans.index')
            ->with('kecelakaans', $kecelakaans);
    }

    /**
     * Show the form for creating a new kecelakaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kecelakaans.create');
    }

    /**
     * Store a newly created kecelakaan in storage.
     *
     * @param CreatekecelakaanRequest $request
     *
     * @return Response
     */
    public function store(CreatekecelakaanRequest $request)
    {
        $c = $request->all();
        $c['geom'] = "MULTIPOLYGON(".$c['geom'].")";
        $kecelakaan = $this->kecelakaanRepository->create($c);

        Flash::success('Kecelakaan saved successfully.');

        return redirect(route('kecelakaans.index'));
    }

    /**
     * Display the specified kecelakaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kecelakaan = $this->kecelakaanRepository->findWithoutFail($id);

        if (empty($kecelakaan)) {
            Flash::error('Kecelakaan not found');

            return redirect(route('kecelakaans.index'));
        }

        return view('kecelakaans.show')->with('kecelakaan', $kecelakaan);
    }

    /**
     * Show the form for editing the specified kecelakaan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kecelakaan = $this->kecelakaanRepository->findWithoutFail($id);

        if (empty($kecelakaan)) {
            Flash::error('Kecelakaan not found');

            return redirect(route('kecelakaans.index'));
        }

        return view('kecelakaans.edit')->with('kecelakaan', $kecelakaan);
    }

    /**
     * Update the specified kecelakaan in storage.
     *
     * @param  int              $id
     * @param UpdatekecelakaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekecelakaanRequest $request)
    {
        $kecelakaan = $this->kecelakaanRepository->findWithoutFail($id);

        if (empty($kecelakaan)) {
            Flash::error('Kecelakaan not found');

            return redirect(route('kecelakaans.index'));
        }

        $kecelakaan = $this->kecelakaanRepository->update($request->all(), $id);

        Flash::success('Kecelakaan updated successfully.');

        return redirect(route('kecelakaans.index'));
    }

    /**
     * Remove the specified kecelakaan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kecelakaan = $this->kecelakaanRepository->findWithoutFail($id);

        if (empty($kecelakaan)) {
            Flash::error('Kecelakaan not found');

            return redirect(route('kecelakaans.index'));
        }

        $this->kecelakaanRepository->delete($id);

        Flash::success('Kecelakaan deleted successfully.');

        return redirect(route('kecelakaans.index'));
    }

    public function getMapKecelakaan($id){
        if ($id != 'all'){
            $store = kecelakaan::where('id',$id)->get();
        }else{
            $store = kecelakaan::all();
        }
        $ret = config('value.t1');
        $i = 0;
        foreach ($store as $l){
            $ret['features'][$i] = config('value.t2');
            $ret['features'][$i]['geometry'] = $l->geom;
            $i++;
        }
        return response()->json($ret);
    }

    public function getCenterKecelakaan($id){
        $store = kecelakaan::select(DB::raw("ST_X(ST_Centroid(geom)) AS lon, ST_Y(ST_CENTROID(geom)) As lat"))
            ->where('id',$id)->first();
        return response()->json($store);
    }
}
