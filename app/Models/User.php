<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, Sortable, HasApiTokens;
    
    const ROLE_ADMIN = 1;
    const ROLE_SHOP_MANAGER = 2;
    const ROLE_USER = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'full_name',  'birthday', 'gender', 'phone', 'email', 'password', 'role_id', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get Products of Store
     *
     * @return array
     */
    public function stores()
    {
        return $this->hasMany(Store::class, 'manager_id', 'id');
    }
    /**
    * Get Products of User
    *
    * @return \Illuminate\Database\Eloquent\Relations\hasManyThrough
    */
    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            Store::class,
            'manager_id',
            'store_id',
            'id',
            'id'
        );
    }

    /**
    * Get Order of User
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public $sortable = ['username'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
    * Get Role Name
    *
    * @return String
    */
    public function nameRole()
    {
        switch ($this->role_id) {
            case 1:
                return 'Admin';
                break;
            case 2:
                return 'Shop Manager';
                break;
            case 3:
                return 'Customer';
                break;
        }
    }
}
