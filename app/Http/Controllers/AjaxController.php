<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 10:53
 */

namespace App\Http\Controllers;

use App\Components\handbook\Helpers\FieldTypeHelper;
use App\Components\handbook\Services\HandbookService;
use Request;

/**
 * Class AjaxController
 * @package App\Http\Controllers
 */
class AjaxController extends Controller
{
    /**
     * AjaxController constructor.
     */
    public function __construct()
    {
        $this->middleware('ajax');
    }

    /**
     * Дополнительное поле формы структуры справочника
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function additionalHandbookField()
    {
        return view('admin.handbook.additional-field-form', [
            'fieldTypes'      => FieldTypeHelper::getTitlesForDropdown(),
            'index'           => Request::get('index'),
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
        $id = Request::get('id');
        $index = Request::get('index');
        $handbookService = new HandbookService();
        $handbook = $handbookService->getHandbook($id);
        return view('admin.handbook.single-data-form', [
            'index'            => $index,
            'id'               => $id,
            'relatedData'      => $handbookService->getRelatedData($handbook),
            'additionalFields' => $handbookService->getAdditionalFields($handbook, $index)
        ]);
    }
}