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
use App\Components\handbook\Repositories\HandbookRepository;
use App\Admin\Components\handbook\Requests\HandbookRequest;
use \Illuminate\Support\Facades\Request as RequestFacade;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use \App\Components\handbook\Facades\Handbook as HandbookFacade;

/**
 * Class HandbookController
 * @package App\Admin\Http\Controllers
 */
class HandbookController extends Controller
{
    /**
     * @var HandbookRepository
     */
    private $handbookRepository;

    /**
     * HandbookController constructor.
     * @param HandbookRepository $handbookRepository
     */
    public function __construct(HandbookRepository $handbookRepository)
    {
        $this->middleware('ajax', ['except' => ['index', 'form', 'delete', 'showData', 'refreshCache']]);

        $this->handbookRepository = $handbookRepository;
    }

    /**
     * Handbooks list
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
     * @throws BadRequestHttpException
     */
    public function create(HandbookRequest $handbookRequest)
    {
        if ($this->handbookRepository->create($handbookRequest->all())) {

            flash('Справочник создан')->success();

            return response()->json([
                'url' => route('admin.handbook.show-data', ['id' => $this->handbookRepository->getId()])
            ]);
        }

        throw new BadRequestHttpException();
    }

    /**
     * Handbook form
     *
     * @param null|integer $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form($id = null)
    {
        return view('admin.handbook.form', [
            'handbook'      => $this->handbookRepository->getHandbook($id),
            'handbooksList' => HandbookFacade::getList($id ? $id : null),
            'fieldTypes'    => FieldTypeHelper::getTitlesForDropdown(),
        ]);
    }

    /**
     * Change handbook structure
     *
     * @param integer $id
     * @param HandbookRequest $handbookRequest
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @throws BadRequestHttpException
     */
    public function update($id, HandbookRequest $handbookRequest)
    {
        if ($this->handbookRepository->update($id, $handbookRequest->all())) {

            flash('Справочник изменен')->success();

            return response()->json(['url' => route('admin.handbook.show-data', ['id' => $id])]);
        }

        throw new BadRequestHttpException();
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
        if ($this->handbookRepository->delete($id)) {
            flash('Справочник удален')->warning();
        } else {
            flash('Невозможно удалить справочник т.к. он является родителем одного из справочников')->error();
        }

        return redirect(route('admin.handbooks'));
    }

    /**
     * Show handbook data
     *
     * @param integer $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showData($id)
    {
        $handbook = $this->handbookRepository->getHandbook($id);

        return view('admin.handbook.form-data', [
            'handbook'     => $handbook,
            'handbookData' => $handbook->handbookData->all(),
            'relatedData'  => $this->handbookRepository->getRelatedData($handbook),
        ]);
    }

    /**
     * Add data to handbook
     *
     * @param DataRequest $dataRequest
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @throws BadRequestHttpException
     */
    public function saveData(DataRequest $dataRequest)
    {
        if ($this->handbookRepository->saveData($dataRequest->all())) {

            flash('Данные справочника сохранены')->success();

            return response()->json(['url' => route('admin.handbooks')]);
        }

        throw new BadRequestHttpException();
    }

    /**
     * Delete handbook data record
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws BadRequestHttpException
     * @throws \Exception
     */
    public function deleteDataItem()
    {
        if ($this->handbookRepository->deleteDataRecord(RequestFacade::get('id'))) {
            return response()->json();
        }

        return response()->json(['message' => $this->handbookRepository->getErrors()], 500);
    }

    /**
     * Additional field for handbook structure
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function additionalHandbookField()
    {
        return view('admin.handbook.additional-field-form', [
            'fieldTypes'      => FieldTypeHelper::getTitlesForDropdown(),
            'index'           => RequestFacade::get('index'),
            'additionalField' => null,
        ]);
    }

    /**
     * Handbook data form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addNewDataField()
    {
        $index = RequestFacade::get('index');
        $handbook = $this->handbookRepository->getHandbook(RequestFacade::get('id'));

        return view('admin.handbook.single-data-form', [
            'index'            => $index,
            'handbook'         => $handbook,
            'relatedData'      => $this->handbookRepository->getRelatedData($handbook),
            'additionalFields' => $this->handbookRepository->getAdditionalFields($handbook, $index),
            'data'             => null,
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
        HandbookFacade::setToCache();

        flash('Кэш обновлен')->warning();

        return back();
    }
}