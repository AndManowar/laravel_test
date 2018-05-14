<?php

namespace App\Components\Admin\Models;

use App\Components\Rbac\Models\Role;
use App\Components\Rbac\Traits\Rbac;
use Illuminate\Foundation\Auth\User;

/**
 * @property int $id
 * @property string $email
 * @property boolean $active
 * @property string $remember_token
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Profile $profile
 */
class Admin extends User
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
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get full name
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->profile->surname.' '.$this->profile->name;
    }

    /**
     * Get user role (in this case user can have only one role)
     *
     * @return Role|string
     */
    public function getRole()
    {
        if(isset($this->roles->all()[0])){
            return $this->roles->all()[0];
        }

        return '';
    }
}
