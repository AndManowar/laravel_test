<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 11.05.18
 * Time: 10:53
 */

namespace App\Admin\Http\Controllers;

use App\Components\Admin\Grids\AdminGrid;
use App\Components\Admin\Models\Admin;
use App\Components\Admin\Repositories\AdminRepository;
use App\Components\Admin\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class AdministratorController
 * @package App\Admin\Http\Controllers
 */
class AdministratorController extends Controller
{
    /**
     * @var AdminRepository
     */
    private $adminRepository;

    /**
     * AdministratorController constructor.
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        return (new AdminGrid())
            ->create(['query' => Admin::query(), 'request' => $request])
            ->renderOn('admin.users.admins.index');
    }

    /**
     * Create administrator
     *
     * @param AdminRequest $adminRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createAdmin(AdminRequest $adminRequest)
    {
        if ($this->adminRepository->create($adminRequest->all())) {
            flash('Администратор создан');

            return redirect(route('admin.admins'));
        }

        throw new BadRequestHttpException();
    }

    /**
     * Update Admin
     *
     * @param integer $id
     * @param AdminRequest $adminRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editAdmin($id, AdminRequest $adminRequest)
    {
        if ($this->adminRepository->update($id, $adminRequest->all())) {
            flash('Информация администратора обновлена');

            return redirect(route('admin.admins'));
        }

        throw new BadRequestHttpException();
    }

    public function form($id = null)
    {
        return view('admin.users.admins.form', [
            'admin' => $this->adminRepository->getAdmin($id)
        ]);
    }

    /**
     * Delete admin by id
     *
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        if ($this->adminRepository->delete($id)) {
            flash('Администратор удален')->success();
        } else {
            flash('Ошибка при удалении администратор')->error();
        }

        return redirect()->back();
    }
}