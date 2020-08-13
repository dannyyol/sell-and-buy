<div class="side-padding">
    <div class="panel panel-default">
      <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
      <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
    </div>


    <ul class="list-group">
      @if (auth()->user())
        <li class="list-group-item text-muted">{{ $user->name }}'s Activity <i class="fa fa-dashboard fa-1x"></i></li>
        <li class="list-group-item text-right" id = "markasread" onclick="markNotificationAsRead('{{ count(auth()->user()->unreadnotifications) }}')" data-toggle="collapse" aria-expanded="false" data-target="#notify"><span class="pull-left"><strong>

          {{-- Notification --}}

            <a href="#notify" style="">Notification
            </a>




        </strong></span> {{ count(auth()->user()->unreadnotifications) }}</li>
        {{-- <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li> --}}
        <li class="list-group-item text-right" data-toggle="collapse" data-target= '#post'><span class="pull-left"><strong><a href="#post">Posts</a></strong></span> {{ $thread }} </li>
        <li class="list-group-item text-right" data-toggle="collapse" data-target="#advert"><span class="pull-left"><strong><a href="#advert">Adverts</a></strong></span> {{ $products }} </li>

      @endif

    </ul>
    @guest

    @else
      <div class="panel panel-default">
        <div class="panel-heading">Social Media</div>
        <div class="panel-body">
          <form action="{{ url('messages') }}" method="POST">
            {{ csrf_field() }}
            <fieldset class="form-group">
              <input type="email" class="form-control nav-linkdisabled" id="email" name="email" placeholder="Enter email" value="daniel.borngreat@io" readonly>
              <small class="text-muted">We'll never share your email with anyone else.</small>
            </fieldset>
            <fieldset class="form-group">
              <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Enter message" name="bodyMessage" id="bodyMessage"></textarea>
            </fieldset>

          <button type="submit" class="btn btn-success bg-light" style="width:100%;color:white;">Send Message</button>
        </form>
        </div>
      </div>
    @endguest
  </div>

  </div><!--/col-3-->
