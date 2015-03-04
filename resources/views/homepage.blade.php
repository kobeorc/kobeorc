@extends('app')
@include('myproject')


@section('header')
	<div class="header">
		<img src="/theme/logo.png" class="logo" />
	</div>
@endsection

@section('content')
 <div class="content">
  <div class="left_side">
    <h2>Me</h2>

    <div class="person">
      <p><img class="picture" src="/theme/picture.png"/></p>
      <p class="simple_text">Name: Meshkov Dmitry</p>
      <p class="simple_text">Born: july 1991(age 23)</p>
      <h3>Contacts</h3>
      <p class="skype"><img  src="/theme/icons/skype-icon.png" /> kobe_orc</p>
      <ul class="social_network">
        <li><a href=""><img src="/theme/icons/vk-icon.png" /></a></li>
        <li><a href=""><img src="/theme/icons/facebook-icon.png" /></a></li>
        <li><a href=""><img src="/theme/icons/twitter-icon.png" /></a></li>
        <li><a href=""><img src="/theme/icons/google-icon.png" /></a></li>
      </ul>
    </div>
  </div>
  <div class="right_side">
    <h2>My Projects</h2>
    <div class="project">
      <ul>
        <li><a target="_blank" href="#"><p class="link">Ugpik.ru</p><img src="/theme/ugpik_preview.png" /></a></li>
        <li><a target="_blank" href="#"><p class="link">Techeco-ug.ru</p><img src="/theme/techeco-ug_preview.png" /></a></li>
        <li><a target="_blank" href="#"><p class="link">Diplomat-ug.ru</p><img src="/theme/diplomat-ug_preview.png" /></a></li>
      </ul>
    </div>
  </div>
  
</div>

@endsection

@section('footer')
	<div class="footer">
	    <img src="/theme/direction.png" />
	</div>
@endsection