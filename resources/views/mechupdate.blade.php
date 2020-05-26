<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .pad{
        margin-left: 64px;
      }
        body {
               /* background-image: url("/resources/views/maindp.jpg"); */
               background-color: rgb(210, 227, 243);
               /* background-attachment: fixed; */
            }
            .Mech_List{
                color: crimson;
                text-align: left;
                font-size: 50px;
                font-family: 'Courier New', Courier, monospace;
                text-shadow: 2px 2px rgb(129, 150, 245);
            }
  </style>
</head>
<body>
  <div class="Mech_List">
    Edit Mechanic
  </div>
<div class="col-md-6">
  
<form class="form-horizontal" action="/update/{{$Edit['id']}}" method="POST">
    @csrf
    <input type="hidden" value="{{$Edit['id']}}">

    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Name:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$Edit['name']}}">
        </div>
      </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$Edit['email']}}">
      </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="phone">Phone:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="pass" placeholder="Enter number" name="phone" value="{{$Edit['phone']}}">
        </div>
      </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
