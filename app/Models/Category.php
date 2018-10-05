<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use SoftDeletes, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id'
    ];

    public $sortable = ['id', 'name', 'created_at'];

    /**
     * Relationship hasMany with Like
     *
     * @return array
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Count sub categories
     *
     * @param int $id Integer
     *
     * @return int
     */
    public static function countChild($id)
    {
        return Category::where('parent_id', $id)->count();
    }

    /**
     * Count parent categories
     *
     * @return int Integer
     */
    public static function countParents()
    {
        return Category::where('parent_id', 0)->count();
    }

    /**
     * Get the products for the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    /**
     * Get the products for the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
