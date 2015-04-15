<?php session_start();
require_once('config/config.php');
 require_once('config/class.config.php');?>

<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Заголовок</title>
	<meta name="description" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="media/images/1.png" />
	<link rel="stylesheet" href="media/libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="media/libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	
	<link href='http://fonts.googleapis.com/css?family=Molle:400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="media/css/fonts.css" />
	<link rel="stylesheet" href="media/css/main.css" />
	<link rel="stylesheet" href="media/css/media.css" />
</head>
<body>
	
	<div class='header-top'>
		<div class='header-line'>
			<div class='container'>
			<div class='col-md-12'>
				<div class='row'>
				<div class='toplinks'>
				<?php 
				if ($_SESSION['id_user_position']){
?>
					<a href='kabinet.php'>Кабинет пользователя</a> 
					<a href='index.php'>Выход</a>
<?PHP
				}
				else{
?>
					<a href='auth.php'>Вход</a> 
					<a href='reg.php'>Регистрация</a>
<?PHP
				}
				?>
				</div>
				<div class='soc_buttons'>
					<a href='#'><i class="fa fa-vk"></i></a>
					<a href='#'><i class="fa fa-facebook-square"></i></a>
				</div>
								<div>
			</div>
			</div>
		</div>
		</div>
	</div>
		<div class='container'>
				<div class='col-md-12'>
				<div class='row'>
				<a href='#' class='logo'>E.Verutina-Design</a> 
				<nav class="main_menu clearfix">
				<ul>
					<li class='active'><a href='index.php?url=index'>Главная</a></li>
					<li><a href='index.php?url=about'>О себе</a></li>
					<li><a href='#'>Мехенди</a></li>
					<li><a href='index.php?url=news'>Новости</a></li>
					<li><a href='#'>Продукция</a></li>
					<li><a href='#'>Отзывы</a></li>
				</ul>
				
				<div class='topcontacts'>
				<i class="fa fa-mobile"></i>(029)250-55-55
				</div>
				</nav>
				<h1>визажист стилист мастер мехенди<h1>
				<div class='container-1'>
				<div class='col-md-2'>
				<p>Меня зовут Екатерина Верютина!
Любовь к макияжу и стилю я испытываю уже много лет. Мне безумно приятно украшать милых девушек в самые важные и незабываемые моменты жизни!
Макияжем всегда стараюсь, подчеркнуть
На моих страницах </p>
				</div>
				<div class='col-md-6'>