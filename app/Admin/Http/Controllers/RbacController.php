<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 08.05.18
 * Time: 10:31
 */

namespace App\Admin\Http\Controllers;

use App\Components\Rbac\Repositories\RbacRepository;
use Request;
use App\Components\Rbac\Facades\RbacFacade;
use App\Components\Rbac\Requests\PermissionGroupRequest;
use App\Components\Rbac\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Components\Rbac\Models\Permission;
use App\Components\Rbac\Models\PermissionGroup;
use App\Components\Rbac\Models\Role;

/**
 * Class RbacController
 * @package App\Admin\Http\Controllers
 */
class RbacController extends Controller
{
    /**
     * @var RbacRepository
     */
    private $rbacRepository;

    /**
     * RbacController constructor.
     * @param RbacRepository $rbacRepository
     */
    public function __construct(RbacRepository $rbacRepository)
    {
        $this->middleware('ajax', ['only' => [
            'changeRoleGroup',
            'addPermissionsToGroups',
            'deleteFromGroup',
        ]]);

        $this->rbacRepository = $rbacRepository;
    }

    /**
     * Index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.rbac.index', [
            'roles'            => Role::query()->get()->all(),
            'permissions'      => Permission::query()->get()->all(),
            'permissionGroups' => PermissionGroup::query()->get()->all(),
        ]);
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
            'role' => $this->rbacRepository->getRbacModel(Role::class, $id),
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
     * Show PermissionGroup create/edit form
     *
     * @param null|integer $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissionGroup($id = null)
    {
        return view('admin.rbac.permissionGroup.form', [
            'permissionGroup' => $this->rbacRepository->getRbacModel(PermissionGroup::class, $id),
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

            return redirect(route('admin.rbac.index'));
        }

        throw new BadRequestHttpException();
    }

    /**
     * Permission Group delete
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

    /**
     * Change role group
     */
    public function changeRoleGroup()
    {
        RbacFacade::changeRoleGroup(
            Request::get('roleId'),
            Request::get('groupId'),
            Request::get('checked')
        );
    }

    /**
     * Get routes without permissions
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRoutesWithoutPermissions()
    {
        return view('admin.rbac.set-permissions-form', [
            'routes'           => RbacFacade::getRoutesWithoutPermissions(),
            'permissionGroups' => $this->rbacRepository->getPermissionGroupList(),
        ]);
    }

    /**
     * Add permissions to group
     */
    public function addPermissionsToGroups()
    {
        RbacFacade::setPermissionToGroup(
            Request::get('groupId'),
            Request::get('permissionName'),
            $this->rbacRepository);
    }

    /**
     * Get permissions list by group
     *
     * @param integer $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPermissionsByGroup($id)
    {
        $permissionGroup = $this->rbacRepository->getRbacModel(PermissionGroup::class, $id);

        return view('admin.rbac.permissionGroup.permissions', [
            'permissionGroup' => $permissionGroup,
            'permissions'     => $permissionGroup->permissions()->get()->all(),
        ]);
    }

    /**
     * Remove Permission from Group
     *
     * @return  void
     * @throws \Exception
     */
    public function deleteFromGroup()
    {
        $this->rbacRepository->deleteRbacModel(Request::get('id'), Permission::class);
    }
}