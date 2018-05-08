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

    public function index()
    {

    }

    public function role($id = null)
    {

    }

    public function createRole(RoleRequest $roleRequest)
    {

    }

    public function updateRole($id, RoleRequest $roleRequest)
    {

    }

    public function deleteRole($id)
    {

    }

    public function permission($id = null)
    {

    }

    public function createPermission(PermissionRequest $roleRequest)
    {

    }

    public function updatePermission($id, PermissionRequest $roleRequest)
    {

    }

    public function deletePermission($id)
    {

    }

    public function permissionGroup($id = null)
    {

    }

    public function createPermissionGroup(PermissionGroupRequest $roleRequest)
    {

    }

    public function updatePermissionGroup($id, PermissionGroupRequest $roleRequest)
    {

    }

    public function deletePermissionGroup($id)
    {

    }
}