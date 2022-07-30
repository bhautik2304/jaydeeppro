
    <!-- ======= Header ======= -->
  <header style="{{$style}}" id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
        <img src="logo.png" alt="chai ke coffee" />
      </a>
      <div class="">
          @if (session()->get('login'))
          {{-- <span >{{session()->get('user')['name']}}</span> --}}
          <ul class="nav">
            <li class="nav-item text-danger">
                <a class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{session()->get('user')['name']}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('logout')}}"><i class="bi text-danger bi-power my-1"></i>Logout</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <div class="">
                    <a class="btn-book-a-table mt-1" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><i class="bi bi-bag"></i>
                  </a>
                    <span class="position-absolute top-1 translate-middle badge rounded-pill bg-danger">
                        <div class="productcount">{{count($cartdata['product'])}}</div>
                        <span class="visually-hidden">unread messages</span>
                      </span>
                </div>
            </li>
          </ul>
          @else
          <div>
              <a class="btn-book-a-table" href="#" data-bs-toggle="modal" data-bs-target="#authmodel">Login</a>
              {{-- <a class="btn-book-a-table" href="#" data-bs-toggle="modal" data-bs-target="#signup">Signup</a> --}}
          </div>
          @endif
      </div>
      {{-- <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i> --}}
    </div>
</header><!-- End Header -->
</div>

<x-authmodel/>

@if (session()->get('login')==true)
<x-offcanvas/>
@else

@endif

<script>
    $(document).ready(function () {
        $("#loginshow").show();
        $("#signupshow").hide();
    });
    function signup() {
        $("#loginshow").hide();
        $("#signupshow").show();
     }
     function login() {
        $("#loginshow").show();
        $("#signupshow").hide();
     }

</script>
