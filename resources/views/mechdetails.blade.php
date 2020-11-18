<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
               /* background-image: url("/resources/views/maindp.jpg"); */
               background-color: rgb(210, 227, 243);
               /* background-attachment: fixed; */
            }
            .Mech_List{
                color: crimson;
                text-align: center;
                font-size: 50px;
                font-family: 'Courier New', Courier, monospace;
                text-shadow: 2px 2px rgb(129, 150, 245);
            }
            marquee{
                color: darkcyan;
            }
            .add{
                margin-left: 300px;
            }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <marquee> <h2>Welcome to Onroad Vehicle Helpppp anurag</h2></marquee>
            
            @role('admin')
            <div class="Mech_List">
                Mechanics List
            </div>
            @endrole
            @role('admin')
            <a href="/mechanic"><button class="btn btn-success">Add</button></a>
            @endrole
          </div>
          @role('admin|user')
          <div class="Mech_List">List of All Mechanics</div>
        <div class="container">
          
          <table class="table">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
        
        
              </tr>
            </thead>
            <tbody>
                @foreach ($show as $details)
                    
                
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$details->name}}</td>
                <td>{{$details->email}}</td>
                <td>{{$details->phone}}</td>
                @role('admin')
              <td><a href="/edit/{{$details['id']}}"><button class="btn btn-success">Edit</button></a></td>
                @endrole
                @role('user')
              <td><a href="/help" ><button class="btn btn-success"  >Get Help</button></a></td>
              @endrole
              </tr>      
              @endforeach
              <a href="/mechlist" ><button class="btn btn-success" >Get Help</button></a><br>
              
            </tbody>
          </table>
        </div>
        @endrole
        @role('user')

            <div class="col-sm-4 add">
                <button class="btn btn-success" onclick="get()">Get Current Address</button>
            <form action="{{url('/mechlist')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Latitude:</label>
                    <input type="text" class="form-control" id="lat" name="lat">
                    
                  </div>
                  <div class="form-group">
                    <label for="name">Longitude:</label>
                    <input type="text" class="form-control" id="long" name="long">
                    
                  </div>
                
                  <button class="btn btn-success" type="submit" class="btn btn-default">Get Help</button>
            </form>
            
            @endrole
            {{-- <a href="/mechlist" ><button class="btn btn-success" >Get Help</button></a><br> --}}
        </div>
        <span id="loc"></span>
        <span id="locc"></span>
        

        <script type="text/javascript">
            function get(){
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(position => {
                        var lat=position.coords.latitude;
                      var long=position.coords.longitude;
                      document.getElementById('lat').value=lat;
                     
                      document.getElementById('long').value=long;
            
                        console.log(position.coords);
                    });
                } else {
                    console.error("Geolocation is not supported by this browser!");
                }
              }
            </script>

            





       
    </body>
</html>


