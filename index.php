<?php 

//random staff
$date = new DateTime('1991-07-01');
$now = new DateTime('now');
$age = $date->diff($now)->format('%Y');
?>


<html lang="en">
<head>
<title>Welcome to kobeorc.com</title>

<link rel="SHORTCUT ICON" href="theme/favicon.png" type="image/png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link href="css/main.css" rel="stylesheet">

</head>
<body>
<div class="container_fluid header">
	<a href="http://kobeorc.com"> <img src="theme/logo.png" class="logo" /></a>
</div>
<div class="container-fluid custom_content">
 <div class="row">
  <div class="col-sm-5">
    <h1 class="text-center">Me</h1>
    <div class="container-fluid">
      <p class="text-center"><img class="picture" src="theme/picture.png"/></p>
      <h3>Name: Meshkov Dmitry</h3>
      <h3>Born: july 1991(age <?=$age?>)</h3>
      <h2 class="text-center">Contacts</h2>
      <p class="text-center"><img class="custom_skype" src="theme/icons/skype-icon.png" /><i> kobe_orc</i></p>
      <div class="row">
        <div class="col-xs-3"><a target="blank" href="http://vk.com/kobeorc"><img class="img-responsive" src="theme/icons/vk-icon.png" /></a></div>
        <div class="col-xs-3"><a target="blank" href="https://www.facebook.com/profile.php?id=100001648843184"><img class="img-responsive" src="theme/icons/facebook-icon.png" /></div>
        <div class="col-xs-3"><a target="blank" href="http://twitter.com/kobeorc"><img class="img-responsive" src="theme/icons/twitter-icon.png" /></a></div>
        <div class="col-xs-3"><a target="blank" href="https://plus.google.com/110946708756852717793/posts"><img class="img-responsive" src="theme/icons/google-icon.png" /></a></div>
      </div>
    </div>
  </div>
  <div class="col-sm-offset-2 col-sm-5">
    <h1 class="text-center">My Projects</h1>
    <div class="row text-center">
      <div class="col-md-6">
        <a class="custom_link" target="_blank" href="http://ugpik.ru"><p>Ugpik.ru</p><img src="theme/ugpik_preview.png" /></a>
      </div>
      <div class="col-md-6">
        <a class="custom_link" target="_blank" href="http://techeco-ug.ru"><p>Techeco-ug.ru</p><img src="theme/techeco-ug_preview.png" /></a>
      </div>
      <div class="col-md-6">
        <a class="custom_link" target="_blank" href="http://diplomat-ug.ru"><p>Diplomat-ug.ru</p><img src="theme/diplomat-ug_preview.png" /></a>
      </div>
    </div>
  </div>
</div>
	<div class="container-fluid text-center">
    	<img class="road_work" src="theme/road_work.png" />
	</div>
</body>
</html>
