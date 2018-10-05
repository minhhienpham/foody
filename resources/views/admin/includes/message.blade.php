<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
    @if ($errors->any())
      <div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li><br>
        @endforeach
      </div>
    @endif
    @if (session('message'))
      <div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        {{session('message')}}
      </div>
    @endif
    @if (session('alert'))
      <div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        {{session('alert')}}
      </div>
    @endif
  </div>
</div>
