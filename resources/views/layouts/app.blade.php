<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'BFBlock') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <div>
        @include('navigate')

    </div>
    <div class="container-fluid" style="margin-top: 60px">
        @yield('content')
    </div>
</div>

</body>
</html>
