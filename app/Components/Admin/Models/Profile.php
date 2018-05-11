<?php

namespace App\Components\Admin\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $admin_id
 * @property string $surname
 * @property string $name
 * @property string $last_name
 * @property string $birthday
 * @property string $avatar
 * @property string $created_at
 * @property string $updated_at
 * @property Admin $admin
 */
class Profile extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'admin_profile';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'admin_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['surname', 'name', 'last_name', 'birthday', 'avatar'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
