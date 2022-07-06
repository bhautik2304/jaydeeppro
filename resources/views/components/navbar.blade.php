
    <!-- ======= Header ======= -->
  <header style="{{$style}}" id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
        <img src="logo.png" alt="chai ke coffee" />
      </a>
      @if (Auth::check())
      {{Auth::user()->name}}
      @else
      <div>
          <a class="btn-book-a-table" href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a>
          <a class="btn-book-a-table" href="#" data-bs-toggle="modal" data-bs-target="#signup">Signup</a>
      </div>
      @endif
      {{-- <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i> --}}
    </div>
</header><!-- End Header -->
</div>

<x-login/>
<x-signup/>
