@extends('admin.layout.master')
@section('title',__('user.admin.edit.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <h2 class="card-inside-title">{{ __('user.admin.edit.form_title') }}</h2>
        <div class="row clearfix">
          <div class="col-sm-12">
            <form id="demo-form2" method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="form-group">
                  <label for="username">{{ __('user.admin.username') }}</label>
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" readonly="true" disabled placeholder="{{ __('user.admin.create.enter_username') }}" />
                </div>
                <div class="form-group">
                  <label for="full_name">{{ __('user.admin.fullname') }}</label>
                  <div class="form-line">
                    <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $user->full_name) }}" placeholder="{{ __('user.admin.create.enter_fullname') }}" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="birthday">{{ __('user.admin.birthday') }}</label>
                  <div class="form-line">
                    <div class="input-group date datepicker" data-provide="datepicker">
                      <input type="text" name="birthday" class="form-control" value="{{ old('birthday', $user->birthday) }}" placeholder="{{ __('user.admin.create.enter_birthday') }}"/>
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="demo-radio-button">
                    <label for="gender">{{ __('user.admin.gender') }}</label><br>
                      <input name="gender" type="radio" id="radio_1" value="1" @if ($user->gender == 1) checked @endif>
                      <label for="radio_1">{{ __('user.admin.female') }}</label>
                      <input name="gender" type="radio" id="radio_2" value="0" @if ($user->gender == 0) checked @endif>
                      <label for="radio_2">{{ __('user.admin.male') }}</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone">{{ __('user.admin.phone') }}</label>
                  <div class="form-line">
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" placeholder="{{ __('user.admin.create.enter_phone') }}" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">{{ __('user.admin.email') }}</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}" readonly="true" disabled placeholder="{{ __('user.admin.create.enter_email') }}" />
                </div>
                <div class="form-group">
                  <div class="form-line">
                    <label class="control-label">{{ __('user.admin.role') }}</label>
                    <select name="role_id" class="form-control">
                      <option value="1" @if ($user->role_id == 1) selected @endif>{{__('user.admin.show.role_admin')}}</option>
                      <option value="2" @if ($user->role_id == 2) selected @endif>{{__('user.admin.show.role_shop_manager')}}</option>
                      <option value="3" @if ($user->role_id == 3) selected @endif>{{__('user.admin.show.role_user')}}</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="demo-radio-button">
                    <label for="is_active">{{ __('user.admin.active') }}</label><br>
                      <input name="is_active" type="radio" class="with-gap" id="radio_3" value="1" @if ($user->is_active == 1) checked @endif>
                      <label for="radio_3">{{ __('user.admin.actived') }}</label>
                      <input name="is_active" type="radio" class="with-gap" id="radio_4" value="0" @if ($user->is_active == 0) checked @endif>
                      <label for="radio_4">{{ __('user.admin.deactived') }}</label>
                  </div>
                </div>
              <button type="submit" id="submit" name="submit" class="btn btn-success">{{ __('user.admin.edit.update_user') }}</button>&nbsp;
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
