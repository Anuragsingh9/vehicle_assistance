











 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Vehicle Assisstance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVuI47KbLYO1TVKcJyZHQSIzzCaVVZ4p8&libraries=places"></script> 
  
 <script type="text/javascript">
  function get(){
      if(navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(position => {
           var lat=document.getElementById('lattt').innerHTML=position.coords.latitude;
           var lng= document.getElementById('lng').innerHTML=position.coords.longitude;
            
           $('#lat').val(lat);
           $('#lng').val(lng);
              console.log(position.coords);
          });
      } else {
          console.error("Geolocation is not supported by this browser!");
      }
    }
  </script>

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
        #map-canvas{
          width: 600px;
          height: 250px;
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

    @role('user')
    <div class="container">
        <h2>Welcome to Onroad Vehicle Help Centre</h2>
        <form action="{{url('/gethelp')}}" method="POST">
          {{ csrf_field() }}

          <div class="form-group">
            
            
          </div>
          <div class="form-group">
              <label for="name">Address:</label>
              <input type="text" class="form-control" id="searchmap">
              
            </div>

            <div class="form-group"> 
              <label for="name">Lat:</label>
              <input type="text" class="form-control" id="lat" placeholder="Enter Address link here" name="lat" required>
            </div>

            <div class="form-group"> 
              <label for="name">Lng:</label>
              <input type="text" class="form-control" id="lng" placeholder="Enter Address link here" name="lng" required>
            </div>


          <div class="form-group">
            <label for="problem">Type of Problem:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter problem" name="problem" required>
          </div>

          <div class="form-group">
            <label for="problem">Name of Mechanic</label>
            <input type="text" class="form-control"  placeholder="Enter mechanic name" name="mech_name" required>
          </div>
          
          
          <button type="submit" class="btn btn-default">Submitt</button>
          <button class="btn btn-success" onclick="get()">Get Your Location</button>
        </form>
        {{-- <div id="lattt">

        </div> --}}
        
      </div>

     





      

      @endrole
      @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      
  @endif 
</body>
</html> 
