<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use App\Http\Requests\Admin\EditStatusOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')->withCount('orderdetails')->sortable()->orderBy('created_at', 'desc')->paginate(config('paginate.number_orders'));
        return view('admin.pages.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id int
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['user','orderDetails.product:id,name,price'])->find($id);
        return view('admin.pages.orders.show', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditStatusOrderRequest $request EditStatusOrderRequest
     * @param Order                  $order   Order
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditStatusOrderRequest $request, Order $order)
    {
        try {
            if ($order->processing_status == 3) {
                $order->processing_status = $request->processing_status;
            }
            $order->payment_status = $request->payment_status;
            $order->delivery_time = $request->delivery_time;
            $order->save();
            return redirect()->route('admin.orders.show', $order->id)->with('message', __('order.admin.message.edit'));
        } catch (Exception $ex) {
            return redirect()->route('admin.orders.show', $order->id)->with('message', __('order.admin.message.edit_fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order Order
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try {
            $order->orderDetails()->delete();
            $order->delete();
            return redirect()->route('admin.orders.index')->with('message', __('order.admin.message.del'));
        } catch (Exception $ex) {
            return redirect()->route('admin.orders.index')->with('message', __('order.admin.message.del_fail'));
        }
    }
}
