<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 01.05.18
 * Time: 13:37
 */

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * Class MainpageController
 * @package App\Admin\Http\Controllers
 */
class MainpageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.mainpage.index');
    }

}