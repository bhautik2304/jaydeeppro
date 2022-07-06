@extends('layouts.product')
@section('titel',"menu")
@section('content')
{{-- <x-menu :dataa="$data"/> --}}
<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Menu</h2>
            <p>Check Our <span>Yummy Menu</span></p>
        </div>
        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            @foreach ($data['pro'] as $menus)
            @if ($menus['id']==1)
            <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#{{$menus['menuid']}}">
                    <h4>{{$menus['name']}}</h4>
                </a>
            </li><!-- End tab nav item -->
            @else
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#{{$menus['menuid']}}">
                    <h4>{{$menus['name']}}</h4>
                </a>
            </li><!-- End tab nav item -->
            @endif
            @endforeach
        </ul>


    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
        @php
            $i=0;
        @endphp
        @foreach ($data['pro'] as $menus)
        @if ($menus['id']==1)
        <div class="tab-pane fade active show" id="{{$menus['menuid']}}">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>{{$menus['name']}}</h3>
            </div>

            <div class="row gy-5">

                @foreach ($data['pro'][$i]['product'] as $prod)
                <div class="col-lg-4 menu-item">
                  <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                  <h4>{{$prod['name']}}</h4>
                  <p class="ingredients">
                    Lorem, deren, trataro, filede, nerada
                  </p>
                  <p class="price">
                    $5.95
                  </p>
                </div><!-- Menu Item -->
                @endforeach
            </div>
          </div><!-- End Starter Menu Content -->
        </li><!-- End tab nav item -->
        @else
        <div class="tab-pane fade" id="{{$menus['menuid']}}">

            <div class="tab-header text-center">
                <p>Menu</p>
                <h3>{{$menus['name']}}</h3>
            </div>

            <div class="row gy-5">
                @foreach ($data['pro'][$i]['product'] as $prod)
                <div class="col-lg-4 menu-item">
                    <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                    <h4>{{$prod['name']}}</h4>
                    <p class="ingredients">
                        Lorem, deren, trataro, filede, nerada
                    </p>
                    <p class="price">
                        $5.95
                    </p>
                </div><!-- Menu Item -->
                @endforeach

            </div>
        </div><!-- End Starter Menu Content -->
        @endif
        @php
            $i++
        @endphp
        @endforeach
        </div>
      </section><!-- End Menu Section -->
@endsection
