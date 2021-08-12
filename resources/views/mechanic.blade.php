<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Vehicle Assisstance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
</style>
</head>
<body>

<div class="container">
  
  <div class="Mech_List">
    Add New Mechanic
  </div>
  <form action="{{url('/mechanicstore')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="email" placeholder="Enter name" name="name">
      </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter number" name="phone">
    </div>
    <div class="form-group">
      <label for="phone">Lat:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter number" name="lat">
    </div>
    <div class="form-group">
      <label for="phone">long:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter number" name="long">
    </div>
    <button type="submit" class="btn btn-default">Submitt</button>
  </form>
</div>

</body>
</html>
