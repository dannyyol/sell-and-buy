@extends('layout.layout')

@section('content')
<br /><br />
<br />
  <form action="{{ route('payment.store') }}" method="post">
    {{ csrf_field() }}
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <button type="button" onclick="payWithPaystack()" class="btn btn-primary"> Pay </button>
  </form>

  <script>
    function payWithPaystack(){
      var handler = PaystackPop.setup({
        key: 'pk_test_3951b4454956cca18d8707a29d2d33ad9c86db2a',
        email: 'daniel.bornreat@gmail.com',
        amount: 120000,
        currency: "NGN",
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        firstname: 'Daniel',
        lastname: 'Ayo',
        // label: "Optional string that replaces customer email"
        metadata: {
           custom_fields: [
              {
                  display_name: "Mobile Number",
                  variable_name: "mobile_number",
                  value: "+2348032385253"
              }
           ]
        },
        callback: function(response){
            alert('success. transaction ref is ' + response.reference);
        },
        onClose: function(){
            alert('window closed');
        }
      });
      handler.openIframe();
    }
  </script>
<br><br>


@endsection
