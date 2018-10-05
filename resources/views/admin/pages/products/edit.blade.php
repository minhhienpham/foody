@extends('admin.layout.master')
@section('title',__('product.admin.edit.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <h2 class="card-inside-title">{{ __('product.admin.edit.form_title') }}</h2>
        <div class="row clearfix">
          <div class="col-sm-12">
            <form id="demo-form2" method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>{{ __('product.admin.show.name') }}</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" placeholder="{{ __('product.admin.create.enter_name') }}" />
              </div>
              <div class="form-group">
                <label>{{ __('product.admin.show.describe') }}</label>
                <div class="form-line">
                  <textarea name="describe" class="form-control" rows='4' placeholder="{{ __('product.admin.create.enter_describe') }}">{{ old('describe', $product->describe) }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label>{{ __('product.admin.show.price') }}</label>
                <div class="form-line">
                <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}" placeholder="{{ __('product.admin.create.enter_price') }}"/>
                </div>
              </div>
              <div class="form-group">
              <div class="form-line">
                <label class="control-label">{{ __('product.admin.show.store') }}</label>
                <select name="store_id" class="form-control">
                  @foreach ($stores as $id => $name)
                    <option {{ $id == $product->store_id ? 'selected' : '' }} value="{{ $id }}">{{ old('name', $name) }}</option>
                  @endforeach
                </select>
              </div>
              </div>
              <div class="form-group">
                <div class="form-line">
                  <label class="control-label">{{ __('product.admin.show.category') }}</label>
                  <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                      <option {{ $category->id == $product->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ old('name', $category->name) }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>{{ __('product.admin.show.images') }}</label>
                <div class="form-line">
                  <input type="file" name="image[]" class="form-control" multiple/>
                </div>
              </div>
              @foreach ($images as $image)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <img class="img-responsive thumbnail"  src="images/products/{{ $image->path }}"/>
                </div>
              @endforeach
              <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('product.admin.edit.update_product') }}</button>&nbsp;
              <a href="{{ route('admin.products.index') }}" name="submit" class="btn btn-info waves-effect">{{ __('product.admin.edit.cancel') }}</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
