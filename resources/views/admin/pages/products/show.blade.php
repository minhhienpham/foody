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
          <h2>{{__('product.admin.show.details_product')}}</h2>
          <a href="{{ route('admin.products.create') }}"
            class="btn bg-green waves-effect" style="margin-top: 30px;"> <i
            class="material-icons">playlist_add</i> <span>{{ __('product.admin.show.create_product') }}</span>
          </a>
          <ul class="header-dropdown m-r--5">
            <li><a href="{{ route('admin.products.index') }}"
              class="btn btn-info waves-effect"
              style="margin: -14px 14px 0 0px;"> <i class="material-icons"
                style="color: white;">keyboard_backspace</i> <span>Back</span>
            </a></li>
          </ul>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('product.admin.show.name')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-22">{{ $product->name }}</p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('product.admin.show.describe')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-20">{{ $product->describe }}</p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('product.admin.show.price')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-20">{{ $product->price }} VND</p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('product.admin.show.category')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-20">{{ $product->category->name }}</p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('product.admin.show.store')}}:</h4>
          </div>
          <div class="col-sm-9">
            <p class="font-20"><a href="{{route('admin.stores.showProducts', $product->store->id)}}">{{ $product->store->name }}</a></p>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-3">
            <h4>{{__('product.admin.show.images')}}:</h4>
          </div>
          <div class="col-sm-9">
            @if (!$product->images->isEmpty())
              @foreach ($product->images as $image)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <img height="200" class="img-responsive thumbnail" src="images/products/{{ $image->path }}">
                </div>
              @endforeach
            @else
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <img class="img-responsive thumbnail" src="images/products/no-image.jpg">
              </div>
            @endif
          </div>
        </div>
        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-success waves-effect">
            <i class="material-icons">mode_edit</i>
            <span>{{ __('product.admin.show.edit') }}</span>
          </a>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
