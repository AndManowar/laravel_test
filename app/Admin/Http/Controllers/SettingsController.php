<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 07.05.18
 * Time: 13:32
 */

namespace App\Admin\Http\Controllers;

use App\Components\Settings\Grids\SettingsGrid;
use App\Components\Settings\Helpers\FieldsTypeHelper;
use App\Components\Settings\Models\Setting;
use App\Components\Settings\Repositories\SettingsRepository;
use App\Components\Settings\Requests\SettingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class SettingsController
 * @package App\Admin\Http\Controllers
 */
class SettingsController extends Controller
{
    /**
     * @var SettingsRepository
     */
    private $settingsRepository;

    /**
     * SettingsController constructor.
     * @param SettingsRepository $settingsRepository
     */
    public function __construct(SettingsRepository $settingsRepository)
    {
        $this->middleware('ajax', ['only' => ['getValueField']]);

        $this->settingsRepository = $settingsRepository;
    }

    /**
     * Settings grid
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        return (new SettingsGrid())
            ->create(['query' => Setting::query(), 'request' => $request])
            ->renderOn('admin.settings.index');
    }

    /**
     * Show settings form
     *
     * @param null|integer $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form($id = null)
    {
        return view('admin.settings.form', [
            'setting'     => $this->settingsRepository->getSetting($id),
            'fieldsTypes' => FieldsTypeHelper::getTitlesForDropdown()
        ]);
    }

    /**
     * Create new setting
     *
     * @param SettingRequest $settingRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(SettingRequest $settingRequest)
    {
        if ($this->settingsRepository->create($settingRequest->all())) {

            flash('Настройка создана')->success();

            return response()->json(['url' => route('admin.settings')]);
        }

        throw new BadRequestHttpException();
    }

    /**
     * Update setting
     *
     * @param integer $id
     * @param SettingRequest $settingRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, SettingRequest $settingRequest)
    {
        if ($this->settingsRepository->update($id, $settingRequest->all())) {

            flash('Настройка изменена')->success();

            return response()->json(['url' => route('admin.settings')]);
        }

        throw new BadRequestHttpException();
    }

    /**
     * Delete setting
     *
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        if ($this->settingsRepository->delete($id)) {
            flash('Настройка удалена')->warning();
        } else {
            flash('Невозможно удалить настройку')->error();
        }

        return redirect()->back();
    }

    /**
     * Get value form field
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws BadRequestHttpException
     */
    public function getValueField()
    {
        if ($type = \Illuminate\Support\Facades\Request::get('type')) {

            return view('admin.settings.value-form-item', [
                'field' => FieldsTypeHelper::getFormField($type)
            ]);
        }

        throw new BadRequestHttpException();
    }
}