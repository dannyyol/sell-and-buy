{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Products
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('product.index')}}">Adverts</a></li>
                    <li><a href="{{route('product.create')}}">Add Product</a></li>
                    <li><a href="{{route('categories.index')}}">Categories</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Schools
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('schools.index')}}">Schools</a></li>
                </ul>
            </li>

            <li class="submenu">
                    <a href="#">
                        <i class="glyphicon glyphicon-list"></i> Threads
                        <span class="caret pull-right"></span>
                    </a>
                    <!-- Sub menu -->
                    <ul>
                        <li><a href="{{ route('thread.index')}}">Categories</a></li>
                        <li><a href="">Threads List</a></li>
                        {{-- <li><a href="{{ route('thread.create')}}">Create Catetory</a></li> --}}
                        
                    </ul>
                </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->
