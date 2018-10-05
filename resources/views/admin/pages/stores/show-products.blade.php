@extends('admin.layout.master')
@section('title',__('product.admin.show.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <div class="header">
        <h2>{{__('store.admin.list.title_list_products')}}{{ $store->name}}</h2>
            <a href="{{ route('admin.products.create') }}"
              class="btn bg-green waves-effect" style="margin-top: 30px;"> <i
              class="material-icons">playlist_add</i><span>{{ __('product.admin.show.create_product') }}</span>
            </a>
            <ul class="header-dropdown m-r--5">
              <li><a href="{{ route('admin.products.index') }}"
                class="btn btn-info waves-effect"
                style="margin: -14px 14px 0 0px;"> <i class="material-icons"
                  style="color: white;">keyboard_backspace</i> <span>Back</span>
              </a></li>
            </ul>
        </div>
        <div class="body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>{{__('product.admin.show.image')}}</th>
                <th>@sortablelink('name', __('product.admin.show.name'))</th>
                <th>@sortablelink('price', __('product.admin.show.price'))</th>
                <th>@sortablelink('store_id', __('product.admin.show.store'))</th>
                <th>{{__('product.admin.show.details')}}</th>
                <th>{{__('product.admin.show.edit')}}</th>
                <th>{{__('product.admin.show.delete')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <th>{{ $product->id }}</th>
                @if (count($product->images))
                  <th style="width: 35%;"><img class="img-responsive thumbnail" src="images/products/{{ $product->images[0]->path }}" style="object-fit: contain;"></th>
                @else
                  <th><img class="img-responsive thumbnail" src="images/products/no-image.jpg"></th>
                @endif
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }} VND</td>
                <td><a href="{{route('admin.stores.showProducts', $product->store->id)}}">{{ $product->store->name }}</a></td>
                <td><a id="details" class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float"
                  href="{{route('admin.products.show', $product->id)}}"><i class="material-icons">remove_red_eye</i></a></td>
                <td><a
                  href="{{route('admin.products.edit', $product->id)}}"
                  class="btn bg-yellow btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">border_color</i>
                </a></td>
                <td><form onsubmit="return confirm('{{__('product.admin.show.delete_confirm')}}');" 
                          class="col-md-4" id="deleteProduct-{{ $product->id }}" 
                          action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-circle waves-effect waves-circle waves-float" type="submit">
                    <i class="material-icons">delete_sweep</i>
                  </button>
                </form></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $products->appends(\Request::except('page'))->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
