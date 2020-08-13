@extends('layout.layout')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br /><br /><br />
      <h3>Cart Items</h3>
      <table class="table table-dark hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Size</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($cartItems as $cartItem)
            <tr>
              <th scope="row">1</th>
              <td>{{ $cartItem->name }}</td>
              <td>{{ $cartItem->price }}</td>
              <td width="50px">
                {!! Form::open(['route'=>['cart.update',$cartItem->rowId], 'method'=>'PUT']) !!}
                  <input type="text" name="qty" value="{{ $cartItem->qty }}" class="form-control" style= "width:3rem;height:2rem;">
              </td>
              <td width="50px">
                <div class="">
                  {!! Form::select('size', ['small'=>'Small', 'medium'=>'Medium', 'large'=>'Large'], $cartItem->options->has('size')?$cartItem->options->size:$cartItem->size, array('class'=>'form-control', 'style'=>'width:10rem;height:2rem;') ) !!}
                  </div>
                </td>

              <td>
                <div class="btn-group">
                  <button type="submit" class="btn btn-sm btn-success" name=""  style="border-radius:0;">Ok</button>
                  {!! Form::close() !!}
                  <form action= "{{ route('cart.destroy', $cartItem->rowId) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-sm" name="" style="border-radius:0;color:#fff;background-color:rgb(222, 97, 97);">Delete</button>
                </div>
              </form>

              </td>
            </tr>
          @endforeach
          <tr>
            <td></td>
            <td></td>
            <td>Tax: #{{ Cart::tax() }}<br />
                Sub Total: ${{ Cart::subtotal() }} <br>
                Grand Total: #{{ Cart::total() }}

            </td>
            <td>Items {{ Cart::count() }}</td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <button type="button" class="btn btn-primary float-right" name="button" style="border-radius:0px;"><a href="{{ url('checkout/') }}" style="color:#fff;"> Checkout</a></button>
      <br><br>
    </div>
  </div>
</div>

@endsection
