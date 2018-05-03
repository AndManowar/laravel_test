<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 02.05.18
 * Time: 10:53
 */

namespace App\Http\Controllers;

use App\Components\handbook\Helpers\FieldTypeHelper;

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
            'fieldTypes' => FieldTypeHelper::getTitlesForDropdown(),
            'index'      => \Request::get('index')
        ]);
    }
}