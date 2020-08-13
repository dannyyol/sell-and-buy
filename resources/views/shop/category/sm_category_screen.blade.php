
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
    <div class="container tab-pane active" id="one"><br>
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



      <br />
      @forelse ($products->chunk(4) as $chunk)
          @foreach ($chunk as $product)
      <div class="row card_wrapper">
        <div class="span4">
          <a href="{{ Route('detail') }}"><img class="img-left" src="{{ url('images', $product->image) }}" alt=""></a>
          <div class="content-heading"><h5>{{ str_limit($product->name, $limit = 18, $end = '...') }}</h5></div>
          <ul>
            <li style="color: rgba(0, 230, 64, 1);font-weight:bold;">#{{$product->price}}</li>
            <li style="color: rgb(147, 136, 136);font-size:16px;">{{ str_limit($product->description, $limit = 20, $end = '...') }}</li>
            <br>
            <li style="color: rgb(147, 136, 136);font-size:12px;font-style:italic; float:right;"> Created {{ $product->updated_at->diffForHumans()}}</l1>

          </ul>
        </div>
     </div>
   @endforeach
 @empty
   <h3>No shirts are available</h3>
 @endforelse
    </div>
  </div>
</div>
  {{-- end --}}
