<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 09.05.2018
 * Time: 12:02
 */
use YaroslavMolchan\Rbac\Models\Permission;
use YaroslavMolchan\Rbac\Models\PermissionGroup;
use YaroslavMolchan\Rbac\Models\Role;

/**
 * @var Role|Permission|PermissionGroup $model
 * @var string $editRoute
 * @var string $deleteRoute
 */
?>

<ul>
    <li><span class="pull-left">{{$model->name}}</span> <span class="pull-right"><a href="{{$editRoute}}"
                                                                                    class="btn btn-success btn-group"><i
                        class="icon-android-create"></i></a>
            @if($model instanceof \YaroslavMolchan\Rbac\Models\PermissionGroup)
                <a href="{{route('admin.rbac.permission-group.permissions', ['id' => $model->id])}}"
                   class="btn btn-warning btn-group"><i class="icon-align-left2"></i></a>
            @endif
            <a href="{{$deleteRoute}}" class="btn btn-danger btn-group"><i class="icon-cross2"></i></a></span></li>
</ul>