<header class="main-header">
    <!-- Logo -->
  <a href="{{route('admin.home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Khanh</b> Blog</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}} - Web Developer
                  <small>Member since {{Auth::user()->created_at->toFormattedDateString()}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle notification" data-toggle="dropdown"><i class="fa fa-bell" aria-hidden="true"> <span id="count">
                {{auth()->user()->unreadNotifications->count()}}</i>
            </span>
            </a>
            <ul class="dropdown-menu" id="showNotification">
            @foreach(auth()->user()->notifications as $noti)
              <li>
                <a href="#" class="{{ $noti->read_at == null ? 'unread' : '' }}">
                  {!! $noti->data['data'] !!}
                </a>
              </li>
            @endforeach  
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <script src="/Streamlab/Streamlab.js"></script>
  <script src="/js/jquery.min.js"></script>
  <script>
    var message, ShowDiv = $('#showNotification'), count = $('#count'), c;
    var slh = new StreamLabHtml();
    var sls = new StreamLabSocket({
        appId:"{{ config('stream_lab.app_id') }}",
        channelName:"test",
        event:"*"
    });
    sls.socket.onmessage = function(res){
        slh.setData(res);
        if(slh.getSource() === 'messages'){
            c = parseInt(count.html());
            count.html(c+1);
            message  = slh.getMessage();
            ShowDiv.prepend('<li><a href="" class="unread">'+message+'</a></li>');
        }
    }
    $('.notification').on('click' , function(){
        setTimeout( function(){
            count.html(0);
            $('.unread').each(function(){
                $(this).removeClass('unread');
            });
        }, 5000);
        $.get('MarkAllSeen' , function(){});
    });
  </script>