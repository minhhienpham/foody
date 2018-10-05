@extends('admin.layout.master')
@section('title',__('user.admin.show.title') )
@section('body')
<!-- Hover Rows -->
<div class="row clearfix">
  @include('admin.includes.message')
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <div class="header">
            <h2>{{__('user.admin.show.form_title')}}</h2>
            <a href="{{ route('admin.users.create') }}"
              class="btn bg-green waves-effect" style="margin-top: 30px;"> <i
              class="material-icons">person_add</i> <span>{{ __('user.admin.show.create_user') }}</span>
            </a>
        </div>
        <div class="body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('username', __('user.admin.username'))</th>
                <th>@sortablelink('fullname',__('user.admin.fullname'))</th>
                <th>@sortablelink('email',__('user.admin.email'))</th>
                <th>@sortablelink('birthday',__('user.admin.birthday'))</th>
                <th>@sortablelink('gender',__('user.admin.gender'))</th>
                <th>@sortablelink('phone',__('user.admin.phone'))</th>
                <th>@sortablelink('role',__('user.admin.role'))</th>
                <th>{{__('user.admin.show.edit')}}</th>
                <th>{{__('user.admin.show.delete')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $userInfo)
              <tr>
                <th>{{ $userInfo->id }}</th>
                <td>{{ $userInfo->username }}</td>
                <td>{{ $userInfo->full_name }}</td>
                <td>{{ $userInfo->email }}</td>
                <td>{{ $userInfo->birthday }}</td>
                @if ($userInfo->gender == 1)
                  <td>{{__('user.admin.female')}}</td>
                @else
                  <td>{{__('user.admin.male')}}</td>
                @endif
                <td>{{ $userInfo->phone }}</td>
                <td>
                  {{ $userInfo->nameRole() }}
                    @if ($userInfo->role_id == 2)
                      <br><a href="{{route('admin.shop-manager.showStores', $userInfo->id)}}">Show list stores</a>
                    @endif
                </td>
                <td>
                  @if (Auth::user()->id == $userInfo->id)
                    <a
                    href="{{route('admin.users.edit', $userInfo->id)}}"
                    class="btn bg-yellow btn-circle waves-effect waves-circle waves-float">
                      <i class="material-icons">border_color</i>
                    </a>
                  @endif
                </td>
                <td>
                  @if (Auth::user()->role_id == 1 && $userInfo->role_id !=1)
                    <form onsubmit="return confirm('{{__('user.admin.show.delete_confirm')}}');" class="col-md-4" id="deleteUser-{{ $userInfo->id }}" action="{{ route('admin.users.destroy', $userInfo->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-circle waves-effect waves-circle waves-float" type="submit">
                        <i class="material-icons">delete_sweep</i>
                      </button>
                    </form>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $users->render() }}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Hover Rows -->
@endsection
