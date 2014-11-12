<!DOCTYPE html>
<html lang="en" ng-app="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/angular1.3-bootstrap3.2/bootstrap-twit/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
        <h1>remoteApp</h1>

        <input type="text" ng-model="name">{{name}}

        @yield('content')

    </div>

    <script href="/angular1.3-bootstrap3.2/angular.min.js"></script>
  </body>
</html>