@extends('layout.layout')

@section('content')
  <!-- Page Content -->
<script type="text/javascript">
$(window).scroll(function() {
var scroll = $(window).scrollTop();
$(".zoom").css({
  backgroundSize: (100 + scroll/5)  + "%",


  //Blur suggestion from @janwagner: https://codepen.io/janwagner/ in comments
  "-webkit-filter": "blur(" + (scroll/50) + "px)",
  filter: "blur(" + (scroll/50) + "px)"
});
});
</script>
<style media="screen">
.zoom{
  position: relative;
  top: -30px;
  overflow: hidden;
   padding-bottom: 10%;
  background-image: url('static/images/b1.jpg');
  background-size: 100% 100%;
  background-position: top center;
}


</style>
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4 header-image zoom">

         <div class="header-content">
           <h1 class="display-3">A Warm Welcome!</h1>
           <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>

         </div>
    </header>


    <section class="search-sec">
    <div class="container">
        <form action="{{ url('/search') }}" method="POST" role="search">
          {{ csrf_field() }}

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
  {{-- comment          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter Pickup City">
                        </div>
                        --}}
                        
                        <div class="col-lg-3 col-md-3 col-sm-4 select_box p-0">
                            <select class="form-control search-slt" id="formcontrol1" name="school_name">
                              <option>Choose school</option>
                              @foreach ($schools as $school)
                                <option>{{ $school->name }}</option>
                              @endforeach

                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-5 search_box p-0">
                            <input type="text" class="form-control search-slt" id= 'formcontrol2' placeholder="Enter Drop City" name="q">
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 search_button p-0">


                          <button type="submit" class="btn wrn-btn float-right search_lg">Search</button>
                            <button type="submit" class="btn wrn-btn float-right search_sm" name=""><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>


    <div class="container">
    <!-- Page Features -->


  @include('shop.product.sm_screen')
    <div class="col-xs|sm|md|lg|xl-1-12 category_content category_content_sm_hide ">
     
      <ul class="nav nav-tabs  d-flex category_list_bg justify-content-center">

          <li class="nav-item">
            <a class="nav-link  active" data-toggle="tab" href="#three">
              @foreach ($categories as $category)
                @if ($category->name=='Hostels')
                  <h5>{{ $category->name }}</h5>
                @endif
              @endforeach
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#four">
            @foreach ($categories as $category)
              @if ($category->name=='Laptops')
                <h5>{{ $category->name }}</h5>
              @endif
            @endforeach
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#five">

            @foreach ($categories as $category)
              @if ($category->name=='Phones')
                <h5>{{ $category->name }}</h5>
              @endif
            @endforeach

          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#six">
            @foreach ($categories as $category)
              @if ($category->name=='Books/Materials')
               <h5> {{ $category->name }}</h5>
              @endif
            @endforeach
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#seven">
            @foreach ($categories as $category)
              @if ($category->name=='Electronics')
                <h5>{{ $category->name }}</h5>
              @endif
            @endforeach
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#eight">
            @foreach ($categories as $category)
              @if ($category->name=='Others')
               <h5> {{ $category->name }}</h5>
              @endif
            @endforeach
          </a>
        </li>
      </ul>

      <div class="tab-content">
        <div class="container tab-pane pane_lg_bg active" id="three"><br>
          <div class="row d-flex justify-content-center">

            <div class="mb-4 touch" style="width:20%;">
              <div class="card_wrapper choose_category" style="font-weight:bold;color:rgb(105,105,105);">
                  <p>Choose From The Categories of hostels</p>
                  <p>We Help you secure your hostel as fast as possible</p>

                </div>
            </div>

            <div class="col-lg-3 col-md-3 mb-4 touch" style="height:30%;">
              <div class="card_wrapper text-center">
                  <div class="card">
                    <a href=""><img class="card-img-top" src="{{ asset('static/images/b1.jpg') }}" alt=""></a>
                      <a href="" class="" style="font-size:12px;">Self Contained with Water</a>
                  </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 mb-4 touch" >
              <div class="card_wrapper text-center">
                  <div class="card h-100">
                    <a href=""><img class="card-img-top float-left img_lg" src="{{ asset('static/images/b2.jpg') }}" alt=""></a>
                      <a href="#" style="font-size:12px;">Without Separate Toilet</a>
                  </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 mb-4 touch" >
              <div class="card_wrapper text-center">
                  <div class="card h-100">
                    <a href=""><img class="card-img-top float-left img_lg" src="{{ asset('static/images/cc1.jpg') }}" alt=""></a>
                      <a href="#" style="font-size:12px;">Without Separate Toilet</a>
                  </div>
                </div>
            </div>


          </div>
          <div class= "" style="margin:auto;text-align:center;">
            <ul class="list-unstyled">
              <li><h6>Get in touch with us for the hostel of your choice: 08032385253</h6></li>
              <br>
              <li><a href="#" class="btn btn-primary primary_button">Pay Online</a></li>
            </ul>
            <br>
          </div>



        </div>

        <div class="container tab-pane pane_lg_bg" id="four"><br>


          <div class="row">
              <div class="touch category_d">
                <div class="card_wrapper">
                    <img class="card-img-top float-left img_lg" src="{{ asset('static/images/cc1.jpg') }}" alt=""  style="height:250px;padding-bottom:30px;padding-left:20px;">
                </div>
              </div>

              <div class="col-lg-3 col-md-3 mb-4 touch">
                <div class="" style="font-size:16px;">
                  <h5>Accessories for Mobile Phones & Tablets</h5>
                  <h5>Mobile Phones</h5>
                  <h5>Tablets</h5>
                </div>
                @foreach ($categories as $category)
                  @if ($category->name=='Laptops')
                    <a href="{{ Route('category.show', $category->id) }}" class="btn btn-primary primary_button">Find Out More!</a>
                  @endif
                @endforeach
              </div>
            </div>



        </div>

          <div class="container tab-pane pane_lg_bg" id="five"><br>
            <div class="row">
                <div class="touch category_d">
                  <div class="card_wrapper">
                      <img class="card-img-top float-left img_lg" src="{{ asset('static/images/cc2.jpg') }}" alt=""  style="height:250px;padding-bottom:30px;padding-left:20px;">
                  </div>
                </div>

                <div class="col-lg-3 col-md-3 mb-4 touch">
                  <div class="" style="font-size:16px;">
                    <h5>Accessories for Mobile Phones & Tablets</h5>
                    <h5>Mobile Phones</h5>
                    <h5>Tablets</h5>
                  </div>
                  {{-- Phones category --}}
                  @foreach ($categories as $category)
                    @if ($category->name=='Phones')
                      <a href="{{ Route('category.show', $category->id) }}" class="btn btn-primary primary_button">Find Out More!</a>
                    @endif
                  @endforeach
                </div>
              </div>

          </div>

          <div class="container tab-pane pane_lg_bg" id="six"><br>


            <div class="row">
                <div class="touch category_d">
                  <div class="card_wrapper">
                      <img class="card-img-top float-left img_lg" src="{{ asset('static/images/cc2.jpg') }}" alt=""  style="height:250px;padding-bottom:30px;padding-left:20px;">
                  </div>
                </div>

                <div class="col-lg-3 col-md-3 mb-4 touch">
                  <div class="" style="font-size:16px;">
                    <h5>Accessories for Mobile Phones & Tablets</h5>
                    <h5>Mobile Phones</h5>
                    <h5>Tablets</h5>
                  </div>
                  @foreach ($categories as $category)
                    @if ($category->name=='Books/Materials')
                      <a href="{{ Route('category.show', $category->id) }}" class="btn btn-primary primary_button">Find Out More!</a>
                    @endif
                  @endforeach
                </div>
              </div>
          </div>
          <div class="container tab-pane pane_lg_bg" id="seven"><br>

            <div class="row">
                <div class="touch category_d">
                  <div class="card_wrapper">
                      <img class="card-img-top float-left img_lg" src="{{ asset('static/images/cc1.jpg') }}" alt=""  style="height:250px;padding-bottom:30px;padding-left:20px;">
                  </div>
                </div>

                <div class="col-lg-3 col-md-3 mb-4 touch">
                  <div class="" style="font-size:16px;">
                    <h5>Accessories for Mobile Phones & Tablets</h5>
                    <h5>Mobile Phones</h5>
                    <h5>Tablets</h5>
                  </div>
                  @foreach ($categories as $category)
                    @if ($category->name=='Electronics')
                      <a href="{{ Route('category.show', $category->id) }}" class="btn btn-primary primary_button">Find Out More!</a>
                    @endif
                  @endforeach

                </div>
              </div>



          </div>



          <div class="container tab-pane pane_lg_bg" id="eight"><br>

            <div class="row">
                <div class="touch category_d">
                  <div class="card_wrapper">
                      <img class="card-img-top float-left img_lg" src="{{ asset('static/images/cc2.jpg') }}" alt=""  style="height:250px;padding-bottom:30px;padding-left:20px;">
                  </div>
                </div>

                <div class="col-lg-3 col-md-3 mb-4 touch">
                  <div class="" style="font-size:16px;">
                    <h5>Accessories for Mobile Phones & Tablets</h5>
                    <h5>Mobile Phones</h5>
                    <h5>Tablets</h5>
                  </div>
                  @foreach ($categories as $category)
                    @if ($category->name=='Others')
                      <a href="{{ Route('category.show', $category->id) }}" class="btn btn-primary primary_button">Find Out More!</a>
                    @endif
                  @endforeach

                </div>
              </div>



          </div>












      </div>
      <br />
      <br />
      <br />
    </div>
    
    <br> <br> <hr> <br><br>
    <div class="large_hd">
      
      <h3 class="heading">Latest Ads in schools</h3>
      <br />
      <div class="row text-center">
        @forelse ($products->chunk(4) as $chunk)
            @foreach ($chunk as $product)
          <div class="col-lg-3 col-md-4 mb-4 touch">
            <div class="card_wrapper">
            <div class="small">
            <div class="card h-100">
            {{-- <a href="{{ url('products', $product->slug) }}"> --}}
              <a href="{{ route('products.show', ['id'=>$product->id, 'name' => $product->slug])}}">
                {{-- <img class="card-img-top float-left img_lg" src="{{ url('images/product', $product->image) }}" alt="{{$product->name}}" style="max-height:200px;"> --}}


                @if ($product->filename)
                  @php
                    $filename = json_decode($product->filename);
                  @endphp
                  @foreach ($filename as $element)
                    @if ($loop->first)
                      <img class="image_resize" src="{{ url('images/product', $element) }}" alt="{{$product->name}}" style="max-height:200px;width:100%;"/>
                     @endif
                  @endforeach
                @else
                @endif
              </a>
              <div class="card-body" style="padding-top:1px;color:rgb(105, 105, 105);">
                <h6 class="card-title" style="text-align:left;">{{ str_limit($product->name, $limit = 18, $end = '...') }}</h6>
                <p class="float-right pricing" style = "margin-bottom:-10px;">#{{$product->price}}</p>
              </div>
            </div>
          </div>
        </div>{{-- small --}}
      </div>

        @endforeach
      @empty
        <div>
          <h5>No products are available</h5>
        </div>

      @endforelse


    </div>



    <!-- /.row -->
    <div class="d-flex justify-content-center">
      <a href="{{ route('product.lists') }}" class="btn btn-primary primary_button"> Show More</a>
    </div>

    <br />

    </div>
</div>
  </div>
  <!-- /.container -->

  {{-- comment<div class="top-footer container-fluid" style="background:red;height:15rem;">

  </div> --}}
@endsection
