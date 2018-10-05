@extends('admin.layout.master')
@section('title','Foody Dashboard')
@section('body')
<!-- Hover Rows -->

<!-- #END# Hover Rows -->
@if (count($count) > 0 &&count($orders) > 0 &&count($countStatus) > 0)
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-red hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">shopping_cart</i>
            </div>
            <div class="content">
                <div class="text">{{ __('index.orders') }}</div>
                <div class="number count-to" data-from="0" data-to="{{ $count['countOrders'] }}" data-speed="1000" data-fresh-interval="20">{{ $count['countOrders'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-indigo hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">face</i>
            </div>
            <div class="content">
                <div class="text">{{ __('index.users') }}</div>
                <div class="number count-to" data-from="0" data-to="{{ $count['countUsers'] }}" data-speed="1000" data-fresh-interval="20">{{ $count['countUsers'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-purple hover-zoom-effect">
            <div class="icon">
              <i class="material-icons">store</i>
            </div>
            <div class="content">
                <div class="text">{{ __('index.stores') }}</div>
                <div class="number count-to" data-from="0" data-to="{{ $count['countStores'] }}" data-speed="1000" data-fresh-interval="20">{{ $count['countStores'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-deep-purple hover-zoom-effect">
            <div class="icon">
              <i class="material-icons">restaurant</i>
            </div>
            <div class="content">
                <div class="text">{{ __('index.products') }}</div>
                <div class="number count-to" data-from="0" data-to="{{ $count['countProducts'] }}" data-speed="1500" data-fresh-interval="20">{{ $count['countProducts'] }}</div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card">
        <div class="body bg-teal">
            <div class="font-bold m-b--35">{{ __('index.orders_report') }}</div>
            <ul class="dashboard-stat-list">
                <li>
                  {{ __('index.today') }}
                    <span class="pull-right">
                      <span class="badge bg-purple">{{ $orders['today'] }}</span>
                      <small>{{ __('index.orders') }}</small>
                    </span>
                </li>
                <li>
                  {{ __('index.yesterday') }}
                  <span class="pull-right">
                    <span class="badge bg-purple">{{ $orders['yesterday'] }}</span>
                    <small>{{ __('index.orders') }}</small>
                  </span>
                </li>
                <li>
                  {{ __('index.lastweek') }}
                  <span class="pull-right">
                    <span class="badge bg-purple">{{ $orders['lastweek'] }}</span>
                    <small>{{ __('index.orders') }}</small>
                  </span>
                </li>
                <li>
                  {{ __('index.lastmonth') }}
                  <span class="pull-right">
                    <span class="badge bg-purple">{{ $orders['lastmonth'] }}</span>
                    <small>{{ __('index.orders') }}</small>
                  </span>
                </li>
                <li>
                  {{ __('index.lastyear') }}
                  <span class="pull-right">
                    <span class="badge bg-purple">{{ $orders['lastyear'] }}</span>
                    <small>{{ __('index.orders') }}</small>
                  </span>
                </li>
                <li>
                  {{ __('index.all') }}
                  <span class="pull-right">
                    <span class="badge bg-purple">{{ $orders['all'] }}</span>
                    <small>{{ __('index.orders') }}</small>
                  </span>
                </li>
            </ul>
        </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="card">
          <div class="header">
              <h2>
                  {{ __('index.orders_report') }}
              </h2>
          </div>
          <div class="body">
              <ul class="list-group">
                  @foreach ($countStatus as $item)
                    @php
                    switch ($item->processing_status) {
                        case 1:
                            $status = __('index.approved');
                            $color = 'green';
                            break;
                        case 2:
                            $status = __('index.cancel');
                            $color = 'red';
                            break;
                        case 3:
                            $status = __('index.pending');
                            $color = 'orange';
                            break;
                    }
                    @endphp
                  <li class="list-group-item">{{ $status }}<span class="badge bg-{{$color}}">{{ $item->number }} {{ __('index.orders') }}</span></li>
                  @endforeach
              </ul>
          </div>
      </div>
  </div>
</div>
@endif
@endsection