
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Helping coordinate a city wide yardsale in northern nevada including Reno, Sparks, Carson City, Gardnerville and Minden">
    <meta name="author" content="Anthony Sullivan">

    <title>FraucCityWide.com</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</head>

<body>
  <div class="container">
    <div class="row"><a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i> Go Back</a><br /></div>
    @foreach($data as $yardsale)
      <div class="row" style="border-bottom:thin solid #DDD;">
        <span class="lead">{{ $yardsale->address }}</span>
      </div>
    @endforeach
  </div>  

</body>

</html>

