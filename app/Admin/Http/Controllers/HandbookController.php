<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 01.05.18
 * Time: 13:28
 */

namespace App\Admin\Http\Controllers;

use App\Admin\Components\handbook\Requests\HandbookRequest;
use App\Components\handbook\Grids\HandbooksGrid;
use App\Components\handbook\Grids\HandbooksGridInterface;
use App\Components\handbook\Helpers\FieldTypeHelper;
use App\Components\handbook\Models\Handbook;
use App\Components\handbook\Requests\DataRequest;
use App\Components\handbook\Services\HandbookService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class HandbookController
 * @package App\Admin\Http\Controllers
 */
class HandbookController extends Controller
{
    /**
     * @var HandbookService
     */
    private $handbookService;

    /**
     * HandbookController constructor.
     * @param HandbookService $handbookService
     */
    public function __construct(HandbookService $handbookService)
    {
        $this->handbookService = $handbookService;
    }

    /**
     * Handbooks
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        return (new HandbooksGrid())
            ->create(['query' => Handbook::query(), 'request' => $request])
            ->renderOn('admin.handbook.index');
    }

    /**
     * Create handbook action
     *
     * @param HandbookRequest $handbookRequest
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function create(HandbookRequest $handbookRequest)
    {
        $this->middleware('ajax');

        if ($this->handbookService->create($handbookRequest->all())) {

            flash('Справочник создан')->success();

            return response()->json(['url' => route('admin.handbook')]);
        }

        return response('Error', 500);
    }

    /**
     * Handbook form
     *
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form($id = null)
    {
        return view('admin.handbook.form', [
            'handbook'      => $this->handbookService->getHandbook($id),
            'handbooksList' => \App\Facades\Handbook::getList(),
            'fieldTypes'    => FieldTypeHelper::getTitlesForDropdown(),
        ]);
    }

    /**
     * @param integer $id
     * @param HandbookRequest $handbookRequest
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function update($id, HandbookRequest $handbookRequest)
    {
        $this->middleware('ajax');

        if ($this->handbookService->update($id, $handbookRequest->all())) {

            flash('Справочник изменен')->success();

            return response()->json(['url' => route('admin.handbook')]);
        }

        return response('Error', 500);
    }

    /**
     * Show handbook data
     *
     * @param integer $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showData($id)
    {
        return view('admin.handbook.form-data', [
            'id' => $id,
        ]);
    }

    /**
     * Add data to handbook
     *
     * @param DataRequest $dataRequest
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function saveData(DataRequest $dataRequest)
    {
        if ($this->handbookService->addData($dataRequest->all())) {

            flash('Данные справочника сохранены')->success();

            return response()->json(['url' => route('admin.handbook')]);
        }

        return response('Error', 500);
    }

    /**
     * Delete handbook action
     *
     * @param integer $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function delete($id)
    {
        if ($this->handbookService->delete($id)) {
            flash('Справочник удален')->warning();
        } else {
            flash('Невозможно удалить справочник т.к. он является родителем одного из справочников')->error();
        }

        return redirect(route('admin.handbook'));
    }

    public function refreshCache()
    {

    }
}