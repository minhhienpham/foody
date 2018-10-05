<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\Models\Product;
use Illuminate\Http\Response;
use App\Models\Order;
use App\Http\Requests\User\CreateOrderRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;

class OrderController extends ApiController
{
    
    /**
    * Create order
    *
    * @param App\Http\Requests\CreateOrderRequest $request request
    *
    * @return \Illuminate\Http\Response
    */
    public function store(CreateOrderRequest $request)
    {
        $user = Auth::user();
        $products = json_decode($request->products);
        $request['user_id'] = $user->id;
        $request['payment_status'] = 0;
        $request['delivery_time'] = Carbon::parse($request['delivery_time'])->toDateTimeString();
        $request['submit_time'] = Carbon::now()->toDateTimeString();
        $order = Order::create($request->all());
        foreach ($products as $product) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' =>$product->id,
                'quantity' => $product->quantity
            ]);
        }
        $order->load('orderdetails');
        return $this->successResponse($order, Response::HTTP_OK);
    }

     /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $perPage = isset($request->perpage) ? $request->perpage : config('define.order.limit_rows');
        $orders = Order::with('user', 'orderDetails.product.images')->withCount('orderDetails')->where('user_id', $user->id)->paginate($perPage);
        $data = $this->formatPaginate($orders);
        return $this->showAll($data, Response::HTTP_OK);
    }

    /**
    * Update order
    *
    * @param App\Models\Order $order update order
    *
    * @return \Illuminate\Http\Response
    */
    public function update(Order $order)
    {

        $user = Auth::user();
        if ($user->id == $order->user_id) {
            if ($order->processing_status == Order::PENDING_ID) {
                $order->update(['processing_status' => Order::CANCEL_ID]);
                return $this->showOne($order, Response::HTTP_OK);
            }
        }
    }
}
