<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use SoftDeletes, Sortable;

    const APPROVED_ID = 1;
    const CANCEL_ID = 2;
    const PENDING_ID = 3;
    
    const APPROVED_STATUS = 'Approved';
    const CANCEL_STATUS = 'Cancel';
    const PENDING_STATUS = 'Pending';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'address', 'money_ship', 'processing_status', 'submit_time', 'delivery_time', 'customer_note', 'payment_status'
    ];

    protected $sortable = ['id', 'user_id', 'address', 'money_ship', 'processing_status', 'submit_time', 'delivery_time', 'customer_note', 'payment_status'];

    protected $sortableAs = ['orderdetails_count'];

    /**
     * Get User Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get OrderDetail for Order, the name's function isn't the Camel, because Kyslik\ColumnSortable\Sortable
     * doesn't allow the Camel when using withCount().
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    /**
     * Get Processing Status Order
     *
     * @return int Integer
     */
    public function processingStatus()
    {
        $status = Order::find($this->id)->processing_status;
        switch ($status) {
            case self::APPROVED_ID:
                return self::APPROVED_STATUS;
                break;
            case self::CANCEL_ID:
                return self::CANCEL_STATUS;
                break;
            case self::PENDING_ID:
                return self::PENDING_STATUS;
                break;
        }
    }

    /**
     * Scope a query to get number status orders
     *
     * @param \Illuminate\Database\Eloquent\Builder $query query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeProcessStatus($query)
    {
        return $query->select('processing_status', DB::raw('count(processing_status) as number'))
                    ->groupBy('processing_status');
    }

     
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
