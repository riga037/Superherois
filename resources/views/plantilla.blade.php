<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Superherois!</title>
  <!-- CSS only -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
  <div style="padding: 10px; background-color: aliceblue;">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('/planets') }}">Planetes</a>
    <a href="{{ url('/powers') }}">Superpoders</a>
    <a href="{{ url('/superheroes') }}">Superherois</a>         
  </div>

  <div class="container"> 
    @yield('content')
  </div>

</body>
</html>