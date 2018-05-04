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

}