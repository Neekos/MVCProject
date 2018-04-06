<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Redhorse</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">

</head>
<body>
<div class="col-lg head" >
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="logo">
            <img src="/file/logo1.png" class="logoimg" >
          </div> 
          </div>
          <div class="col-md-6">
              <div class="hedinfo">
                <p class="phone"> 8 (3902) 31-31-40</p>
                  <div class="call"><a href="#" class="call2">позвонить</a>
                  </div>
                <p class="hedinfo2">15-й км автодороги Абакан-Саяногорск не доезжая с.Белый Яр</p>
              </div>
          </div>
        </div>
        
      </div>
    </div>
    <nav class="navbar navbar-inverse  navbar-static-top">
      <div class="container hed">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="logo2">
            <a class="navbar-brand" href="?action=main"><img src="/file/logo2.png" class="logoimg2" ></a>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse col">
          <ul class="nav navbar-nav">
            <li class=""><a href="main"><strong>Главная</strong></a></li>
            <li><a href="article"> <strong>Новости</strong> </a></li>
            <li><a href="?action=galerey"> <strong>Фотогалерея</strong> </a></li>
            <li><a href="?action=price"><strong>Прайс лист</strong></a></li>
            <li><a href="?action=akciy"><strong>Акции</strong></a></li>
            <li><a href="?action=forum"><strong>Форум</strong></a></li>
            <li><a href="?action=about"><strong>О нас</strong></a></li>
            <li><a href="/admin">admin</a></li>
              <?php if(!$_SESSION['logged_user']): ?>
              <li><a href="registration">Зарегистрироваться</a></li>
              <li><a href="login">Вход</a></li>
              <?php else: ?>
               <li><a href="?action=lk">Личный кабинет</a></li> 
              <li><a href="?action=logout">Выход</a></li>
              <?php endif; ?>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	 <?php include 'application/views/'.$content_view; ?>
</body>
</html>