
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Helping coordinate a city wide yardsale in northern nevada including Reno, Sparks, Carson City, Gardnerville and Minden">
    <meta name="author" content="Anthony Sullivan">

    <title>FraucCityWide.com</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h2>Printer Friendly List View and Check List</h2>
    <div class="row"><a href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i> Go Back</a><br /></div>
    @foreach($data as $yardsale)
      <div class="row" style="border-bottom:thin solid #DDD;">
        <i class="fa fa-square-o fa-lg"></i><span class="lead"> (#{{ $yardsale->id }}) {{ $yardsale->address }}</span>
      </div>
    @endforeach
  </div>  

</body>

</html>

