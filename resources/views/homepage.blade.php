@extends('app')

@section('header')
<div class="  header">
   <a href="http://kobeorc.com/"><img class="logo" src="/theme/logo.png"></a>
</div>
@endsection




@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-5">
      <h1 class="text-center">Me</h1>
      <div class="container-fluid">
        <p class="text-center"><img class="picture" src="/theme/picture.png" /></p>
        <h3>Name: Meshkov Dmitry</h3>
        <h3>Born: july 1991(age )</h3>
        <h2 class="text-center"><strong>Contacts</strong></h2>
        <p class="text-center"><img width=30px src="/theme/icons/skype-icon.png" /><span>kobe_orc</span></p>
        <div class="row">
          <div class="col-md-3">
            <a href="https://vk.com/kobeorc"><img class="img-responsive" src="/theme/icons/vk-icon.png" /></a>
          </div>
          <div class="col-md-3">
            <a href="https://www.facebook.com/profile.php?id=100001648843184"><img class="img-responsive" src="/theme/icons/facebook-icon.png" /></a>
          </div>
          <div class="col-md-3">
            <a href="https://twitter.com/kobeorc"><img class="img-responsive" src="/theme/icons/twitter-icon.png" /></a>
          </div>
          <div class="col-md-3">
            <a href="https://plus.google.com/u/0/110946708756852717793/posts"><img class="img-responsive" src="/theme/icons/google-icon.png" /></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-offset-2 col-md-5">
    <h1 class="text-center">My Projects</h1>
      <div class="row container-fluid text-center ">
        <div class="col-md-6"><a class="custom_link" target="_blank" href="http://ugpik.ru"><h4>Ugpik.ru</h3><img src="/theme/ugpik_preview.png" /></a></div>
        <div class="col-md-6"><a class="custom_link" target="_blank" href="http://techeco-ug.ru"><h4>Techeco-ug.ru</h4><img src="/theme/techeco-ug_preview.png" /></a></div>
        <div class="col-md-6"><a class="custom_link" target="_blank" href="http://diplomat-ug.ru"><h4>Diplomat-ug.ru</h4><img src="/theme/diplomat-ug_preview.png" /></a></div>
      </div>
  </div>
</div>
@endsection





@section('footer')
<div class="text-center">
    <img class="road_work" src="/theme/road_work.png" />
</div>
@endsection