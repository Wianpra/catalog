
@section('header')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-dark d-inline-block mb-0">@yield('headerName')</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/') }}/@yield('headerURL')">@yield('headerName')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('nav')</li>
              </ol>
            </nav>
          </div>
          @yield('headerContent')
        </div>
      </div>
    </div>
  </div>
@endsection