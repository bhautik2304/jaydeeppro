<?php
 function productdata($product,$i,$in)
{
    ?>
    <tr>
        <th scope="row"><div class="my-4">{{++$in}}</div></th>
        <td>
            <img src="{{$product['menu'][0]['Imgurl']}}" height="50px" width="50px" class="rounded-circle m-3"/>
        </td>
        <td><div class="my-4">₹ {{$product['menu'][0]['price']}}</div></td>
        <td><div class="my-4">{{$product['qty']}}</div></td>
        <td><div class="my-4">₹ {{$product['totale_price']}}</div></td>
      </tr>
    <?php
}
?>
{{-- {{dd($cartitem)}} --}}
<div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasBottomLabel">Your Cart</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small">
            <div class="container">
                <ul class="nav">
                    <li class="nav-item m-1">
                        totale:500
                    </li>
                    <li class="nav-item m-1">
                        <button type="button" name="" id="" onclick="emputycart({{session()->get('user')['id']}})" class="btn btn-danger btn-sm btn-block flex"><i class="bi me-2 bi-bag-x-fill"></i>Empty Cart</button>
                    </li>
                    <li class="nav-item m-1">
                        <button type="button" name="" id="" class="btn btn-danger btn-sm btn-block flex"><i class="bi me-2 bi-bag-x-fill"></i>Check Out</button>
                    </li>
                </ul>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody class="usercartdata">
                    @php
                        $i=0;
                        $in=0;
                    @endphp
                    <div class="cartdata">
                        @foreach ($cartitem['product'] as $product)
                            {{productdata($product,$i,$in)}}

                            @php
                            ++$i;
                            ++$in;
                            @endphp
                        @endforeach
                    </div>
                  {{-- <tr>
                    <th scope="row"><div class="my-4">1</div></th>
                    <td>
                        <img src="{{url('assets/img/hero-img.png')}}" height="50px" width="50px" class="rounded-circle m-3"/>
                    </td>
                    <td><div class="my-4">₹ 15</div></td>
                    <td><div class="my-4">2</div></td>
                    <td><div class="my-4">₹ 30</div></td>
                  </tr> --}}

                </tbody>
                <tr>
                    <th></th>
                    <td></td>
                    <td></td>
                    <td>total:</td>
                    <td>₹<div class="carttotale">{{$cartitem['cart_totale']}}</div></td>
                </tr>
            </table>
        </div>
      </div>
</div>
<script>
    function emputycart(user) {
        const data={
            'userid':user
        }
        $.ajax({
            type: "post",
            url: "http://127.0.0.1:8000/api/emputycart",
            data: data,
            success: function (response) {
                $(".usercartdata").empty();
                $(".carttotale").empty();
                $(".productcount").empty();
                $(".carttotale").append(0)
                $(".productcount").append(0)
                // console.log(response.data)
            }
        });
     }
</script>
