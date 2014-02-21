<!DOCTYPE html>
<html lang="en" ng-app="PolytechMTPProject">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>{{$title}}</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style("css/bootstrap.min.css")}}

    <!-- Fontawesome cdn -->
    {{HTML::style("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css")}}
    {{HTML::style("css/main.css")}}

    @yield('style')
  </head>

  <body ng-app>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::to("/")}}">{{$projectname}}</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <?php if (!empty(Auth::user()->username)): ?>
            <li>{{HTML::link(URL::to("/"."user/logout"), "Log out")}}</li>
            <?php endif; ?>
          </ul>
          <!--<ul class="nav pull-right">
            <li><span><?php if (!empty(Auth::user()->username)) echo "Welcome ". Auth::user()->username?></span></li>
          </ul>-->
        </div>
      </div>
    </div>

    <div class="container">

      @yield('content')

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>

    <!-- Bootstrap core JS -->
    {{HTML::script("js/bootstrap.js")}}
    {{HTML::script("https://ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular.min.js")}}
    {{HTML::script("js/ui-bootstrap-tpls-0.10.0.min.js")}}
    {{HTML::script("js/app.js")}}
    {{HTML::script("js/upload.js")}}

  </body>
</html>
