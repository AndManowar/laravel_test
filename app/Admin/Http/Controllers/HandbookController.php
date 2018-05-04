<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 01.05.18
 * Time: 13:28
 */

namespace App\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Components\handbook\Models\Handbook;
use App\Components\handbook\Grids\HandbooksGrid;
use App\Components\handbook\Requests\DataRequest;
use App\Components\handbook\Helpers\FieldTypeHelper;
use App\Components\handbook\Services\HandbookService;
use App\Components\handbook\Grids\HandbooksGridInterface;
use App\Admin\Components\handbook\Requests\HandbookRequest;

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
     * Change handbook structure
     *
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
        $this->middleware('ajax');

        $handbook = $this->handbookService->getHandbook($id);

        return view('admin.handbook.form-data', [
            'handbook'     => $handbook,
            'handbookData' => $handbook->handbookData->all(),
            'relatedData'  => $this->handbookService->getRelatedData($handbook),
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

    public function deleteDataItem()
    {
        $this->middleware('ajax');
        echo '<pre>';
        print_r('test');
        die();
    }

    /**
     * Дополнительное поле формы структуры справочника
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function additionalHandbookField()
    {
        $this->middleware('ajax');

        return view('admin.handbook.additional-field-form', [
            'fieldTypes'      => FieldTypeHelper::getTitlesForDropdown(),
            'index'           => \Illuminate\Support\Facades\Request::get('index'),
            'additionalField' => null
        ]);
    }

    /**
     * Форма записи справочника
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addNewDataField()
    {
        $this->middleware('ajax');

        $index = \Illuminate\Support\Facades\Request::get('index');
        $handbook = $this->handbookService->getHandbook(\Illuminate\Support\Facades\Request::get('id'));

        return view('admin.handbook.single-data-form', [
            'index'            => $index,
            'handbook'         => $handbook,
            'relatedData'      => $this->handbookService->getRelatedData($handbook),
            'additionalFields' => $this->handbookService->getAdditionalFields($handbook, $index),
            'data'             => null
        ]);
    }

    /**
     * Refreshing cache
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function refreshCache()
    {
        \App\Facades\Handbook::setToCache();

        flash('Кэш обновлен')->warning();

        return back();
    }
}