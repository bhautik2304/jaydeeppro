@extends('layouts.product')
@section('titel',"menu")
@section('content')
{{-- <x-menu :dataa="$data"/> --}}
<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">
{{-- {{dd(session()->get('user'))}} --}}
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
            function slugid($string){
 $slug = trim($string); // trim the string
 $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
 $slug= str_replace(' ','_', $slug); // replace spaces by dashes
 $slug= strtolower($slug);  // make it lowercase
 return $slug;
}
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
                  <a href="{{$prod['Imgurl']}}" class="glightbox"><img src="{{$prod['Imgurl']}}" class="menu-img img-fluid" alt=""></a>
                  <h4>{{$prod['name']}}</h4>
                  <p class="ingredients">
                    {{$prod['disc']}}
                  </p>
                  <p class="price">
                    ₹ {{$prod['price']}}
                  </p>
                  @if (session()->get('login'))
                  <div class="input-group mb-3 w-50 m-auto">
                    <button class="btn btn-outline-secondary" onclick="proencryment('{{slugid($prod['name'].'qty')}}')" type="button">+</button>
                    <input type="text" class="form-control pe-auto" id="{{slugid($prod['name'])}}qty" value="1" placeholder="" aria-label="Example text with two button addons">
                    <button class="btn btn-outline-secondary" onclick="prodecryment('{{slugid($prod['name'].'qty')}}')" type="button">-</button>
                  </div>
                  <button class="btn btn-book-a-table" >Buy now</button>
                  <button class="btn btn-book-a-table" onclick="addtocart({{$prod['id']}},{{session()->get('user')['id']}},{{$prod['price']}},'{{slugid($prod['name'].'qty')}}')">Add to cart</button>
                  @else

                  @endif
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
                    <a href="{{$prod['Imgurl']}}" class="glightbox"><img src="{{$prod['Imgurl']}}" class="menu-img img-fluid" alt=""></a>
                    <h4>{{$prod['name']}}</h4>
                    <p class="ingredients">
                        {{$prod['disc']}}
                    </p>
                    <p class="price">
                        ₹ {{$prod['price']}}
                    </p>
                    @if (session()->get('login'))
                    <div class="input-group mb-3 w-50 m-auto">
                        <button class="btn btn-outline-secondary" onclick="proencryment('{{slugid($prod['name'].'qty')}}')" type="button">+</button>
                        <input type="text" class="form-control pe-auto" id="{{slugid($prod['name'])}}qty" value="1" placeholder="" aria-label="Example text with two button addons">
                        <button class="btn btn-outline-secondary" onclick="prodecryment('{{slugid($prod['name'].'qty')}}')" type="button">-</button>
                      </div>
                  <button class="btn btn-book-a-table" >Buy now</button>
                  <button class="btn btn-book-a-table" onclick="addtocart({{$prod['id']}},{{session()->get('user')['id']}},{{$prod['price']}},'{{slugid($prod['name'].'qty')}}')">Add to cart</button>
                  @else

                  @endif
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
      {{-- {{dd(session()->get('user')['id'])}} --}}
      <script>

        function addtocart (id,userid,price,name) {
            // alert($('#'+name).val())
            const data={
            "user_id":userid,
            "product_id":id,
            "price":price,
            "qty":$('#'+name).val(),
            "totale_price":price*$('#'+name).val(),
                }

            $.ajax({
                type: "POST",
                url: "http://127.0.0.1:8000/api/addtocart",
                data: data,
                success: function (response) {
                   $(".productcount").empty();
                   $(".carttotale").empty();
                   $(".usercartdata").empty();
                   $(".productcount").append(response.cart_data.product.length);
                   $(".carttotale").append(response.cart_data.cart_totale);
                   const resdata=response.cart_data.product
                   function c(p) {
                    return ++p
                }
                   for (let i = 0; i < resdata.length; i++) {
                       let html='<tr><th scope="row"><div class="my-4">'+ c(i) +'</div></th><td><img src="'+resdata[i]["menu"][0]['Imgurl']+'" height="50px" width="50px" class="rounded-circle m-3"/></td><td><div class="my-4">₹ '+resdata[i]["price"]+'</div></td><td><div class="my-4">'+resdata[i]["qty"]+'</div></td><td><div class="my-4">₹ '+resdata[i]["price"]*resdata[i]["qty"]+'</div></td></tr>'
                       $(".usercartdata").append(html);
                    }


                }
            });
         }
         function proencryment(name){
           let qty= $('#'+name).val();
        //    alert(++qty)
           $('#'+name).val(++qty)
          }

          function prodecryment(name){
           let qty= $('#'+name).val();
           if(qty==1){
            $('#'+name).val(1)
           }else{
               $('#'+name).val(--qty)
           }
          }
      </script>
@endsection
