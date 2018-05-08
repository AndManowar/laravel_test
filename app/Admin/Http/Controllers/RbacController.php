<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 10:31
 */

namespace App\Admin\Http\Controllers;

use App\Components\rbac\Repositories\RbacRepository;
use App\Components\rbac\Requests\PermissionGroupRequest;
use App\Components\rbac\Requests\PermissionRequest;
use App\Components\rbac\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use YaroslavMolchan\Rbac\Models\Permission;
use YaroslavMolchan\Rbac\Models\PermissionGroup;
use YaroslavMolchan\Rbac\Models\Role;

/**
 * Class RbacController
 * @package App\Admin\Http\Controllers
 */
class RbacController extends Controller
{
    /**
     * @var RbacService
     */
    private $rbacRepository;

    /**
     * RbacController constructor.
     * @param RbacRepository $rbacRepository
     */
    public function __construct(RbacRepository $rbacRepository)
    {
        $this->rbacRepository = $rbacRepository;
    }

    /**
     * Index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.rbac.index');
    }

    /**
     * Show Role create/edit form
     *
     * @param null|integer $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function role($id = null)
    {
        return view('admin.rbac.role.form', [
            'role' => $this->rbacRepository->getRbacModel(Role::class, $id)
        ]);
    }

    /**
     * Create new role
     *
     * @param RoleRequest $roleRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws BadRequestHttpException
     */
    public function createRole(RoleRequest $roleRequest)
    {
        if ($this->rbacRepository->createRbacModel($roleRequest->all(), Role::class)) {

            flash('Роль создана')->success();

            return redirect(route('admin.rbac.index'));
        }

        throw new BadRequestHttpException();
    }

    /**
     * Update role
     *
     * @param integer $id
     * @param RoleRequest $roleRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws BadRequestHttpException
     */
    public function updateRole($id, RoleRequest $roleRequest)
    {
        if ($this->rbacRepository->updateRbacModel($id, $roleRequest->all(), Role::class)) {

            flash('Роль обновлена')->warning();

            return redirect(route('admin.rbac.index'));
        }

        throw new BadRequestHttpException();
    }

    /**
     * Delete role
     *
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function deleteRole($id)
    {
        if ($this->rbacRepository->deleteRbacModel($id, Role::class)) {
            flash('Роль удалена')->warning();
        } else {
            flash('Невозможно удалить роль')->error();
        }

        return redirect(route('admin.rbac.index'));
    }

    /**
     * Show Permission create/edit form
     *
     * @param null|integer $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permission($id = null)
    {
        return view('admin.rbac.permission.form', [
            'permission' => $this->rbacRepository->getRbacModel(Permission::class, $id)
        ]);
    }

    /**
     * Create permission
     *
     * @param PermissionRequest $permissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws BadRequestHttpException
     */
    public function createPermission(PermissionRequest $permissionRequest)
    {
        if ($this->rbacRepository->createRbacModel($permissionRequest->all(), Permission::class)) {

            flash('Разрешение создано')->success();

            return redirect(route('admin.rbac.index'));
        }

        throw new BadRequestHttpException();
    }

    /**
     * Update permission
     *
     * @param integer $id
     * @param PermissionRequest $permissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws BadRequestHttpException
     */
    public function updatePermission($id, PermissionRequest $permissionRequest)
    {
        if ($this->rbacRepository->updateRbacModel($id, $permissionRequest->all(), Permission::class)) {

            flash('Разрешение обновлено')->warning();

            return redirect(route('admin.rbac.index'));
        }

        throw new BadRequestHttpException();
    }

    /**
     * Delete permission
     *
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function deletePermission($id)
    {
        if ($this->rbacRepository->deleteRbacModel($id, Permission::class)) {
            flash('Разрешение удалено')->warning();
        } else {
            flash('Невозможно удалить разрешение')->error();
        }

        return redirect(route('admin.rbac.index'));
    }

    /**
     * Show PermissionGroup create/edit form
     *
     * @param null|integer $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissionGroup($id = null)
    {
        return view('admin.rbac.permissionGroup.form', [
            'permissionGroup' => $this->rbacRepository->getRbacModel(PermissionGroup::class, $id)
        ]);
    }

    /**
     * Create PermissionGroup
     *
     * @param PermissionGroupRequest $permissionGroupRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws BadRequestHttpException
     */
    public function createPermissionGroup(PermissionGroupRequest $permissionGroupRequest)
    {
        if ($this->rbacRepository->createRbacModel($permissionGroupRequest->all(), PermissionGroup::class)) {

            flash('Группа разрешений создана')->success();

            return redirect(route('admin.rbac.index'));
        }

        throw new BadRequestHttpException();
    }

    /**
     * PermissionGroup Update
     *
     * @param integer $id
     * @param PermissionGroupRequest $permissionGroupRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws BadRequestHttpException
     */
    public function updatePermissionGroup($id, PermissionGroupRequest $permissionGroupRequest)
    {
        if ($this->rbacRepository->updateRbacModel($id, $permissionGroupRequest->all(), PermissionGroup::class)) {

            flash('Группа разрешений обновлена')->warning();

            return redirect(route('admin.rbac.index'));        }

        throw new BadRequestHttpException();
    }

    /**
     * Permission Group dele
     *
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function deletePermissionGroup($id)
    {
        if ($this->rbacRepository->deleteRbacModel($id, PermissionGroup::class)) {
            flash('Группа разрешений удалено')->warning();
        } else {
            flash('Невозможно удалить группу разрешений')->error();
        }

        return redirect(route('admin.rbac.index'));
    }
}