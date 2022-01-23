<style>
    #offcanvasCartLabel{
        font-size: 30px;
    text-align: center;

    }
    #offcanvasCart{
        font-family: Ultra;
        width: 900px;
    margin: 100px 232px 0 231px;
    padding: 30px;
    background-color: #f3f3f3;
    box-sizing: border-box;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);


    }
    .item{
        font-size: 24px;
    }

    ul li{
        text-decoration: none;
        margin: 20px;

    }
    ul{
        text-decoration: none;
        color: black
    }

    a{
        text-decoration: none;
        margin: 20px;
        padding: 20px;
    }

    }
    #pro{
        margin: 30px;

    }
    .col{
        font-family: system-ui;
    }
</style>








<div class="offcanvas offcanvas-end border border-primary rounded" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCart">
  <form action="" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasCartLabel">Shopping Cart</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <span class="item">You have  item </span>
    </div>


    @foreach ($carts as $data)

   {{-- @dd($item) --}}
    <div class="offcanvas-body">
      <ul class="list-unstyled">
        <li>

            <div class="row g-2 g-lg-3 align-items-center" id="pro">
                {{-- <a href="#" style="height: 200px" name="image" class="col-3"><img class="img-fluid" src="{{url('/uploads/products/'. $data->image)}}" --}}
                    alt="Product"></a>
                <div class="col">
                  <input type="hidden" class="id" value="{{$data->id}}">
                  <a href="#" name="name" class="text-black text-primary-hover lead">{{$data['product_name']}}</a>
                  <ul class="list-inline text-muted">
                    <li class="list-inline-item">Qty: <span>{{$data['product_qty']}}x {{$data['product_price']}}</span>
                    <li class="list-inline-item">Total Price: <span class="text-secondary">{{$data['product_price']}} BDT</span></li>
                    {{-- <li class="list-inline-item">Color: <span class="text-secondary">Blue</span></li> --}}

                      <div class="counter text-secondary" data-counter="qty-1">

                        {{-- <span class="counter-minus bi bi-dash"></span>
                        <input type="number" name="qty-1" class="counter-value" value="0" min="0" max="10">
                        <span class="counter-plus bi bi-plus"></span> --}}
                      </div>
                    </li>
                  </ul>
                  {{-- {{Cart::remove($rowId)}} --}}
                  <a href="{{route('remove.cart',$data->rowId)}}" class="text-red underline">Remove</a>

                </div>
              </div>
            </li>
        </ul>
    </div>
    @endforeach




    <span>Subtotal: {{Cart::subtotal()}}</span>

    <button type="submit" class="btn btn-primary" style="background-color: #007bff; padding:10px; border-radius:5px; color:#ffffff">Request</button>

</form>
{{--
    <div class="card" style="width: 18rem;">
        @foreach ($cart as $item)
        <ul class="list-group list-group-flush">

          <li class="list-group-item">{{$item->name}}</li>
          <li class="list-group-item">Qty: <span>{{$item->qty}} x {{$item->price}}</span></li>
          <li class="list-group-item">Total Price: <span class="text-secondary">{{$item->subtotal()}} BDT</span></li>
        </ul>
        @endforeach
        <span>Subtotal: {{Cart::subtotal()}}</span>
      </div> --}}
