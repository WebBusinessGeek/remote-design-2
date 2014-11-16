<!DOCTYPE html>
<html lang="en" ng-app="app">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>remoteApp</title>
    <script src="/app/remoteClass.js"></script>
    <!-- Bootstrap -->
    <link href="/angular1.3-bootstrap3.2/bootstrap-twit/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" ng-controller="someController">
        <h1>remoteApp</h1>

        <input type="text" ng-model="name">{{name}}
        {{kevname}}
        <script>
            var test = new RemoteClass();
            test.getInstance();
            test.oversetThis();
            test.dothis();
         </script>


    </div>



    <div class="container" ng-controller="RemoteController as remote">
            {{remote.comb}}{{remote.setThis('kevin')}}
    </div>

   <some-direction></some-direction>

    <script src="/angular1.3-bootstrap3.2/angular.min.js"></script>
    <script src="/app/app.js"></script>
    <script src="/app/remoteClass.js"></script>
  </body>
</html>