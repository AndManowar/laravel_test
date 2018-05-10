<?php

namespace App\Models\DB;

use App\Components\Rbac\Traits\Rbac;

/**
 * @property int $id
 * @property string $email
 * @property boolean $active
 * @property string $remember_token
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 */
class Admin extends \Illuminate\Foundation\Auth\User
{
    use Rbac;

    /**
     * @var string
     */
    protected $guard = 'admin';

    /**
     * @var array
     */
    protected $fillable = [
        'email',
        'active',
        'password',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
