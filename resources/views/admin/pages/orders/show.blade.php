@extends('admin.layout.master')
@section('title', __('order.admin.detail_title'))
@section('body')
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>
        <i class="material-icons">add</i>{{__('order.admin.show.title')}}
        </h2>
      </div>
      <div class="body">
        <form id="form_advanced_validation" action="{{route('admin.orders.update', $order->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group row">
            <div class="col-sm-4">
              <b>{{__('user.admin.username')}}</b>
              <div class="form-line">
                <input type="text" class="form-control" disabled="disabled"
                  value="{{ $order->user->username }}">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
              <b>{{__('user.admin.fullname')}}</b>
              <div class="form-line">
                <input type="text" class="form-control" disabled="disabled"
                  value="{{ $order->user->full_name }}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <b>{{__('order.admin.address')}}</b>
            <div class="form-line">
              <input type="text" class="form-control" disabled="disabled"
                value="{{ $order->address }}">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
              <b>{{__('user.admin.phone')}}</b>
              <div class="form-line">
                <input type="text" class="form-control" disabled="disabled"
                  value="{{ $order->user->phone }}">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
              <b>{{__('user.admin.email')}}</b>
              <div class="form-line">
                <input type="text" class="form-control" disabled="disabled"
                  value="{{ $order->user->email }}">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
              <b>{{__('order.admin.money_ship')}}</b>
              <div class="form-line">
                <input type="text" class="form-control" disabled="disabled"
                  value="{{ number_format($order->money_ship) .' '. __('order.admin.currency') }}"> 
              </div>
            </div>
          </div>
          <div class="form-group row clearfix">
            <div class="col-sm-4">
              <b>{{__('order.admin.submit_time')}}</b>
              <div class="input-group">
              <span class="input-group-addon">
                <i class="material-icons">access_time</i>
              </span>
              <div class="form-line">
                <input name="submit_time" type="text" value="{{ $order->submit_time }}" disabled="disabled" class="form-control time24">
              </div>
              </div>
            </div>
            <div class="col-sm-4">
              <b>{{__('order.admin.delivery_time')}}</b>
              <div class="input-group">
              <span class="input-group-addon">
                <i class="material-icons">access_time</i>
              </span>
              <div class="form-line">
                <input name="delivery_time" type="text" value="{{ old('delivery_time', $order->delivery_time) }}" class="form-control time24">
              </div>
              </div>
            </div>
            </div>
          <div class="form-group">
            <b>{{__('order.admin.customer_note')}}</b>
            <div class="form-line">
                <input type="text" class="form-control" disabled="disabled"
                value="{{ $order->customer_note }}">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
              <label class="control-label">{{ __('order.admin.processing_status') }}</label>
              <select @if($order->processing_status == 1 || $order->processing_status == 2)  disabled @endif name="processing_status" class="form-control">
                <option @if($order->processing_status == 1) selected @endif value="1">{{ __('order.admin.message.payment_status.approved')}}</option>
                <option @if($order->processing_status == 2) selected @endif value="2">{{ __('order.admin.message.payment_status.cancel')}}</option>
                <option @if($order->processing_status == 3) selected @endif value="3">{{ __('order.admin.message.payment_status.pending')}}</option>              
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
              <label class="control-label">{{ __('order.admin.payment_status') }}</label>
              <select name="payment_status" class="form-control">
                <option @if($order->payment_status == 0) selected @endif value="0">{{ __('order.admin.message.paid.no')}}</option>
                <option @if($order->payment_status == 1) selected @endif value="1">{{ __('order.admin.message.paid.yes')}}</option>
              </select>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header">
                <h2>
                    {{__('order.admin.show.list_products')}}
                </h2>
              </div>
              @php
                $total_orders = 0;
              @endphp
              <div class="body table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>{{__('product.admin.show.name')}}</th>
                      <th>{{__('product.admin.show.price')}}</th>
                      <th>{{__('detail_order.admin.quantity')}}</th>
                      <th>{{__('order.admin.total')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($order->orderDetails as $detailOrder)
                  @php
                    $total_orders += $detailOrder->product->price * $detailOrder->quantity;
                  @endphp
                    <tr>
                      <th scope="row"><a href="{{ route('admin.products.show', $detailOrder->product->id)}}">{{$detailOrder->product->name }}</a></th>
                      <td>{{ number_format($detailOrder->product->price) .' '. __('order.admin.currency')}}</td>
                      <td>{{$detailOrder->quantity}}</td>
                      <th scope="row">{{ number_format($detailOrder->product->price * $detailOrder->quantity) .' '.__('order.admin.currency')}}</th>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <div class="align-right">
                <h3 style="margin-right: 126px; padding-bottom: 25px;">
                  {{__('order.admin.show.total_orders')}}: {{ number_format($total_orders) .' '. __('order.admin.currency')}}</h3>
              </div>
            </div>
          </div>
          <button class="btn btn-success waves-effect" type="submit">{{__('order.admin.edit.update')}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
