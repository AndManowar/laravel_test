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
use App\Components\handbook\Services\HandbookService;
use App\Http\Controllers\Controller;

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
     * @param HandbookRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(HandbookRequest $request)
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

        if ($this->handbookService->create($handbookRequest->validated())) {

            flash('Справочник создан')->success();
            return redirect()->route('admin.handbook');
        }

        return redirect()->back()->withInput();
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form($id = null)
    {
        return view('admin.handbook.form', [
            'handbook'      => $this->handbookService->getHandbook($id),
            'handbooksList' => \App\Facades\Handbook::getList()
        ]);
    }

    public function update(HandbookRequest $handbookRequest, $id)
    {

    }

    public function delete($id)
    {

    }

    public function refreshCache()
    {

    }
}