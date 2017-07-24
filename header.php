<?php
include("config.php");
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<html ng-app="app"><head>
<title>SteemDash</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="stylesheet" href="libs/css/bootstrap.min.css">
<link href="libs/css/style.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="libs/steem/steem.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="libs/steem/steemconnect.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="libs/js/createpost.js"></script>
<script type="text/javascript" charset="UTF-8" src="libs/js/steemdash.js"></script>



</head>
<body>



<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid" ng-controller="Main as main">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Rozwiń nawigację</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">SteemDash</a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
<li><a href="core.php?type=created"><?php echo $lang_created; ?></a></li>
<li><a href="core.php?type=hot"><?php echo $lang_hot; ?></a></li>
<li><a href="core.php?type=trending"><?php echo $lang_trending; ?></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://busy.org/transfer?to=fervi&amount=1.000&currency=SBD&memo=Donate%20for%20Fervi"><?php echo $lang_donate; ?></a></li>


       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $lang_langs; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
<?php

if (strpos($actual_link, 'www') !== false) {
echo '<li><a href="'.str_replace("www", "pl", $actual_link).'">Polish</a></li>';
echo '<li><a href="'.str_replace("www", "fr", $actual_link).'">French</a></li>';
}

if (strpos($actual_link, 'pl') !== false) {
echo '<li><a href="'.str_replace("pl", "www", $actual_link).'">English</a></li>';
echo '<li><a href="'.str_replace("pl", "fr", $actual_link).'">French</a></li>';
}

if (strpos($actual_link, 'fr') !== false) {
echo '<li><a href="'.str_replace("fr", "www", $actual_link).'">English</a></li>';
echo '<li><a href="'.str_replace("fr", "pl", $actual_link).'">Polish</a></li>';
}

?>
          </ul>
</li>

        <li><a href="newpost.php" ng-show="main.isAuth()"><?php echo $lang_add_dash; ?></a></li>
        <li><a href="https://steemconnect.com/" ng-show="main.isAuth()">@{{username}}</a></li>
        <li><a ng-show="main.isAuth()" class="btn btn-secondary" href="https://steemconnect.com/logout"><?php echo $lang_logout; ?></a></li>
        <li><a href="https://steemconnect.com/" ng-href="{{loginURL}}" ng-hide="main.isAuth()"><?php echo $lang_login; ?></a></li>
        <li><a href="https://steemit.com/pick_account" ng-hide="main.isAuth()"><?php echo $lang_register; ?></a></li>
      </ul>
    </div>
  </div>
</nav>





<div class="container"><div class="row">
