@extends('admin.layout.master')
@section('title',__('order.admin.show.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <div class="header">
            <h2>{{__('order.admin.list.title')}}</h2>
            <a href="{{ route('admin.orders.create') }}"
              class="btn bg-green waves-effect" style="margin-top: 30px;"> <i
              class="material-icons">person_add</i> <span>{{ __('order.admin.add.title') }}</span>
            </a>
        </div>
        <div class="body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>@sortablelink('id', __('order.admin.id'))</th>
                <th>@sortablelink('user.username', __('order.admin.username'))</th>
                <th>@sortablelink('address', __('order.admin.address'))</th>
                <th>@sortablelink('orderdetails_count', __('order.admin.total_products'))</th>
                <th>@sortablelink('processing_status', __('order.admin.processing_status'))</th>
                <th>@sortablelink('delivery_status', __('order.admin.delivery_status'))</th>
                <th>@sortablelink('payment_status', __('order.admin.payment_status'))</th>
                <th>{{__('order.admin.table.show')}}</th>
                <th>{{__('order.admin.table.delete')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr>
                <th>{{ $order->id }}</th>
                <td>{{ $order->user->username }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->orderdetails_count }}</td>
                <td>{{ $order->processingStatus() }}</td>
              @if (Carbon\Carbon::now() > $order->delivery_time)
                <td>{{ __('order.admin.message.delivery_status.yes')}}</td>
              @else
                <td>{{ __('order.admin.message.delivery_status.no')}}</td>
              @endif
              @if ($order->payment_status)     
                <td>{{ __('order.admin.message.paid.yes')}}</td>
              @else
                <td>{{ __('order.admin.message.paid.no')}}</td>
              @endif
                <td>
                  <a id="details" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float" href="{{route('admin.orders.show', $order->id)}}">
                    <i class="material-icons">remove_red_eye</i>
                  </a>
                </td>
                <td>
                  <form onsubmit="return confirm('{{__('order.admin.message.msg_del')}}');" class="col-md-4" 
                  id="deleteorder-{{ $order->id }}" action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-circle waves-effect waves-circle waves-float" type="submit">
                      <i class="material-icons">delete_sweep</i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $orders->appends(\Request::except('page'))->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
