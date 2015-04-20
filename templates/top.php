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
	<link rel="stylesheet" href="media/css/fonts.css" />
	<link rel="stylesheet" href="media/css/main.css" />
	<link rel="stylesheet" href="media/css/media.css" />
	<script src="media/js/jquery-1.11.2.min.js"></script>
	<script> $(function(){
	$('.main_menu a:eq(0)').bind('mouseover',
	function(){
	$('.main_menu a:eq(0)').css({
	'background':'black'
	});
	})
	$('.main_menu a:eq(0)').bind('mouseout',
	function(){
	$('.main_menu a:eq(0)').css({
	'background':'#983087'
	});
	})
	});
	</script>
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
					<a href='log_out.php'>Выход</a>
					<a href='buschet.php'>Корзина</a>
<?PHP
				}
				else{
?>
					<a href='auth.php'>Вход</a> 
					<a href='reg.php'>Регистрация</a>
					<a href='buschet.php'>Корзина</a>
<?PHP
				}
				?>
				</div>
				<div class='soc_buttons'>
			<a href='poisk.php'>Поиск</a>
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
				<div class='container-1'>
				<div class='col-md-2'>
				<div class='menu'>
				<?php
					$query="select * from $tbl_categories where showhide='show'";

					$cat=mysql_query($query);
					if(!$cat){
						exit($query);
					}
					while($tt=mysql_fetch_array($cat))
					{echo"<a  class='btn btn-info' href='cat.php?id=".$tt['id']."'>".$tt['name']."</a>";
				}
					?>
					</div>
				</div>
				<div class='col-md-6'>