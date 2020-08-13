
{{--  For small screen--}}
<div class="category_content category_content_lg_hide">
  <ul class="nav nav-tabs category_list_bg d-flex justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#one" style="padding-right:80px;">Category</a>
    </li>
    <li class="nav-item"  style="margin-left:0px;">
      <a class="nav-link" data-toggle="tab" href="#two" style="">Latest Products</a>
    </li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="one"><br>
        {{-- <h6>
          <span class="fa fa-mobile" style="color:#fff;background-color:rgba(0, 230, 64, 0.7);padding:7px 7px 5px 11px;width:35px;height:35px;border-radius:17px;"></span> Phone
        </h6>
        <h6>
          <span class="fa fa-laptop" style="color:#fff;background-color:rgba(0, 230, 64, 0.7);padding:7px 7px 5px 5px;width:35px;height:35px;border-radius:17px;"></span> Laptop
        </h6>
        <h6>
          <span class="fa fa-hotel" style="color:#fff;background-color:rgba(0, 230, 64, 0.7);padding:7px 7px 5px 5px;width:35px;height:35px;border-radius:17px;"> </span>Hostel
        </h6>
        <h6>
          <span class="fa fa-book" style="color:#fff;background-color:rgba(0, 230, 64, 0.7);padding:7px 7px 5px 8px;width:35px;height:35px;border-radius:17px;"> </span>Books/Material
        </h6>
        <h5>
          <span class="fa fa-tv" style="color:#fff;background-color:rgba(0, 230, 64, 0.7);padding:7px 7px 5px 5px;width:35px;height:35px;border-radius:17px;"> </span>Electronics
        </h5>
        <h5>
          <span class="fa fa-plus-circle" style="color:#fff;background-color:rgba(0, 230, 64, 0.7);padding:7px 7px 5px 7px;width:35px;height:35px;border-radius:17px;"> </span>Others
        </h5> --}}





        <!--Accordion wrapper-->
        <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">

          <!-- Accordion card -->
          <div class="card">

            <!-- Card header -->
            <div class="card-header" role="tab" id="headingTwo1">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                aria-expanded="false" aria-controls="collapseTwo1">
                <span class="fa fa-hotel" style=""></span>
                  @foreach ($categories as $category)
                    @if ($category->name=='Hostel')
                      <b>{{ $category->name }}</b>
                    @endif
                  @endforeach <i class="fas fa-angle-down rotate-icon float-right"></i>

              </a>
            </div>

            <!-- Card body -->
            <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1"
              data-parent="#accordionEx1">
              <div class="card-body">
                Choose from the categories of hostels available:
                <ul>
                  <li>-> Self Contained with water</li>
                  <li>-> Self Contained with water</li>
                  <li>-> Self Contained with water</li>
                </ul>
                <a href="#" class="btn btn-primary float-right">Pay Online</a>
                <br>
              </div>
            </div>

          </div>
          <!-- Accordion card -->


        </div>
        <!-- Accordion wrapper -->



        <ul class="list-group list-group-flush" style="font-size:1.2em;">
          <a href="#">
            <li class="list-group-item bg-light">
              <span class="fa fa-laptop" style=""></span>
                @foreach ($categories as $category)
                  @if ($category->name=='Laptops')
                    <a href="{{ Route('category.show', $category-> id) }}">{{ $category->name }}</a>
                  @endif
                  
                @endforeach
            <span class="badge badge-primary badge-pill float-right">
              
              @foreach ($categories as $category)
                  @if ($category->name=='Laptops')
                    {{ $category->products->count() }}
                  @endif
              @endforeach
             
            </span>
            </span>
            </li>
          </a>
          <a href="#">
            <li class="list-group-item bg-light">
              <span class="fa fa-mobile" style=""> </span>
                @foreach ($categories as $category)
                  @if ($category->name=='Phones')
                    <a href="{{ Route('category.show', $category-> id) }}">{{ $category->name }}</a>
                  @endif
                @endforeach
            <span class="badge badge-primary badge-pill float-right">
              
              @foreach ($categories as $category)
                  @if ($category->name=='Phones')
                    {{ $category->products->count() }}
                  @endif
              @endforeach

            </span>
            </li>
          </a>
          <a href="#">
            <li class="list-group-item bg-light">
              <span class="fa fa-book" style=""> </span>
                @foreach ($categories as $category)
                  @if ($category->name=='Books/Materials')
                    <a href="{{ Route('category.show', $category-> id) }}">{{ $category->name }}</a>
                  @endif
                @endforeach
              <span class="badge badge-primary badge-pill float-right">
                
                @foreach ($categories as $category)
                  @if ($category->name=='Books/Materials')
                    {{ $category->products->count() }}
                  @endif
                @endforeach

              </span>
            </li>

          </a>
          <a href="#">
            <li class="list-group-item bg-light">
              <span class="fa fa-tv" style=""> </span>
                @foreach ($categories as $category)
                  @if ($category->name=='Electronics')
                    <a href="{{ Route('category.show', $category-> id) }}">{{ $category->name }}</a>
                  @endif
                @endforeach
              <span class="badge badge-primary badge-pill float-right">
                
                @foreach ($categories as $category)
                  @if ($category->name=='Electronics')
                    {{ $category->products->count() }}
                  @endif
                @endforeach

              </span>
            </li>
          </a>
          <a href="#">
            <li class="list-group-item bg-light">
              <span class="fa fa-plus-circle" style=""> </span>
                @foreach ($categories as $category)
                  @if ($category->name=='Others')
                    <a href="{{ Route('category.show', $category-> id) }}">{{ $category->name }}</a>
                  @endif
                @endforeach
              <span class="badge badge-primary badge-pill float-right">
                  
                @foreach ($categories as $category)
                  @if ($category->name=='Others')
                    {{ $category->products->count() }}
                  @endif
                @endforeach
                
              </span>
            </li>
          </a>
        </ul>

        <br />
    </div>




    <div class="tab-pane" id="two">
      <br />
      {{-- @forelse ($products->chunk(4) as $chunk)
          @foreach ($chunk as $product)
      <div class="row card_wrapper">
        <div class="span4">
          <a href="{{ Route('detail') }}"><img class="img-left" src="{{ url('images', $product->image) }}" alt=""></a>
          <div class="content-heading"><h5>{{ str_limit($product->name, $limit = 18, $end = '...') }}</h5></div>
          <ul>
            <li style="color: rgba(0, 230, 64, 1);font-weight:bold;">#{{$product->price}}</li>
            <li style="color: rgb(147, 136, 136);font-size:16px;">{{ str_limit($product->description, $limit = 20, $end = '...') }}</li>
            <br />
            <li style="color: rgb(147, 136, 136);font-size:12px;font-style:italic; float:right;"> Created {{ $product->updated_at->diffForHumans()}}</l1>

          </ul>
        </div>
     </div>
   @endforeach
 @empty
   <h3>No shirts are available</h3>
 @endforelse --}}


 @forelse ($products as $product)
   <div class="card mb-3 card_product" style="border:0px;">
     <div class="col-md-12 float-left" style="margin-right: -30px;">
       <a href="{{ route('products.show', $product->id) }}">
         @if ($product->filename)
           @php
             $filename = json_decode($product->filename);
           @endphp
           @foreach ($filename as $element)
             @if ($loop->first)
               <img class="card-img-top image-resize" style="" src="{{ url('images/product', $element) }}" alt="{{$product}}">
             @endif
           @endforeach
         @else
         @endif
       </a>
       <div class="float-right product_content1" style="">
         <div style="padding-top:10px;">
           <h6 class="card-title product-name">{{ $product-> name}}</h6>
           <p style="color: rgba(0, 230, 64, 1);font-weight:bold;font-size:16px;float:right;">#{{$product->price}}</p>
           <p class="condition">Status: Used</p>


           {{-- <p class="hide_for_large">{{ str_limit($product->description, $limit = 20, $end = '...') }}</p> --}}
           <p class="hide_for_sm">{{ str_limit($product->description, $limit = 100, $end = '...') }}</p>
           <div class="j">
             <p class="" style=""><small class="text-muted"><i class="far fa-clock"></i> Posted {{ $product->updated_at->diffForHumans()}}</small>
             <small class="text-muted"> <i class="fa fa-map-marker"></i> {{ str_limit($product->school->name, $limit = 100, $end = '...') }}</small></p>
           </div>
         </div>
       </div>
     </div>
   </div>
 @empty
   <div style=""><h3 align="center">No item is available</h3></div>
 @endforelse <div class="d-flex justify-content-center hide_for_large">
   {{ $products->links() }}
 </div>
    </div>
  </div>
</div>
  {{-- end --}}
