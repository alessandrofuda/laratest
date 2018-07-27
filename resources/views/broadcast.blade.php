<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>Test</title>
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
 
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
 
                    <!-- Branding Image -->
                    <a class="navbar-brand123" href="{{ url('/') }}">
                        Test
                    </a>
                </div>
 
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
 
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
 
                                <ul class="dropdown-menu" role="menu" style="display: block;" >
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
 
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
 
        <div class="content">
                <div class="m-b-md">
                    New notification will be alerted realtime!
                </div>
        </div>
    </div>
 
    <!-- receive notifications -->
    <script>window.module = {};</script>
    <script src="{{ asset('js/echo.js') }}"></script>
 
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
         
        <script>
          Pusher.logToConsole = true;
         
          window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ $pusher_key }}',
            cluster: 'eu',
            encrypted: true,
            logToConsole: true
          });
         
          Echo.private('user.{{ $user_id }}')
          .listen('NewMessageNotification', (e) => {
              alert(e.message.message);
          });
        </script>
    <!-- receive notifications -->
 





    <!-- receive notifications -->
        <!--script>
            // funzionante su public channel
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;


            // console.log('ok');
            // console.log('t.data.socket_id'); //.socket_id);   // t.data.socket_id



            var pusher = new Pusher('{{-- $pusher_key --}}', {
                //authEndpoint: '{{-- asset('pusher_auth') --}}?channel_name=private-user.{{-- $user_id --}}&socket_id=??????????',
                auth: {
                    headers: {
                        'X-CSRF-Token': "{{-- csrf_token() --}}"
                    }
                },
                cluster: 'eu',
                encrypted: true
            }); 

            var channel = pusher.subscribe('private-user.{{-- $user_id --}}');   // 'my-channel'
            channel.bind('App\\Events\\NewMessageNotification', function(data) {    // 'my-event'
                // console.log(data);
                alert(JSON.stringify(data.message));
            });
        </script-->
    <!-- receive notifications -->


</body>
</html>