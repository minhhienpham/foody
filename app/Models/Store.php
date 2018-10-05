<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ShopOpeningStatus;

class Store extends Model
{
    use SoftDeletes, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'manager_id', 'address', 'phone', 'describe', 'image', 'is_active'
    ];

    public $sortable = ['id', 'name', 'created_at'];

    /**
     * Get User Manager Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }

    /**
     * Get ShopOpenStatus Object
     *
     * @return array
     */
    public function shopOpenStatus()
    {
        return $this->hasOne(ShopOpeningStatus::class, 'store_id', 'id');
    }

    /**
     * Get Products of Store
     *
     * @return array
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
