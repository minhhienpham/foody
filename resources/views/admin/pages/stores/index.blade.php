@extends('admin.layout.master')
@section('title', __('store.admin.title'))
@section('body')
<div class="row clearfix">
  @include('admin.includes.message')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
      <div class="header">
        <h2>{{__('store.admin.title')}}</h2>
        <a href="{{ route('admin.stores.create') }}"
            class="btn bg-green waves-effect" style="margin-top: 30px;"> <i
            class="material-icons">add</i><span>{{ __('store.admin.add.create') }}</span>
        </a>
      </div>
      <div class="body table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>@sortablelink('id', __('store.admin.id'))</th>
              <th>@sortablelink('name', __('store.admin.name'))</th>
              <th>@sortablelink('address',__('store.admin.address'))</th>
              <th>{{ __('store.admin.products') }}</th>
              <th>{{ __('store.admin.table.show') }}</th>
              <th>{{ __('store.admin.table.edit') }}</th>
              <th>{{ __('store.admin.table.delete') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($stores as $store)
              <tr>
                <th scope="row">{{ $store->id }}</th>
                <td><a href="{{ route('admin.stores.show', $store->id) }}">{{ $store->name }}</a></td>
                <td>{{ $store->address }}</td>
                <td><a id="details" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float"
                  href="{{route('admin.stores.showProducts', $store->id)}}"><i class="material-icons">remove_red_eye</i></a></td>
                <td><a id="details" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float"
                    href="{{ route('admin.stores.show', $store->id) }}"><i class="material-icons">remove_red_eye</i></a></td>
                <td><a
                    href="{{route('admin.stores.edit', $store->id)}}"
                    class="btn bg-yellow btn-circle waves-effect waves-circle waves-float">
                  <i class="material-icons">border_color</i>
                  </a>
                </td>
                <td class="js-sweetalert">
                  <form class="del-form" action="{{ route('admin.stores.destroy', $store->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button id="delete-{{$store->id}}" class="btn btn-danger btn-circle waves-effect waves-circle waves-float"  onclick="return confirm('@lang('store.admin.message.msg_del')')" type="submit">
                      <i class="material-icons">delete_sweep</i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {!! $stores->appends(\Request::except('page'))->links() !!}
      </div>
		</div>
	</div>
</div>
@endsection
