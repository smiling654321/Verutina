<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");
  // Подключаем блок отображения текста в окне браузера
  require_once("../utils/utils.print_page.php");

  // Данные переменные определяют название страницы и подсказку.
  $title = 'Управление блоком "Текстовое наполнение сайта"';
  $pageinfo = '<p class=help>Здесь можно добавить
               статью, отредактировать или
               удалить уже существующий статью.</p>';

  // Включаем заголовок страницы
  require_once("../utils/top.php");

  try
  {
  $page_link=3;
  $pnumber=5;
  $obj=new pager_mysql($tbl_issue,
						"",
						"ORDER BY id DESC",
						$pnumber,
						$page_link);
$news=$obj->get_page();
if(!empty($news))
	{
	?>
	<table width=100% class='table' border=0>
		<tr class=header align='center'>
		<td>Заголовок</td>
		<td width="400px">Текст статьи</td>
		<td>URL адрес</td>
		<td width="200px">Действие</td>
		</tr>
		<?php
	for ($i=0; $i <count($news); $i++){
		$url="?id=".$news[$i]['id']."&page=".$_GET['page'];
		if($news[$i]['showhide']=='show'){
		$showhide="<a href=issuehide.php$url title='Скрыть'>
		<img src='../utils/img/folder_locked.gif' border=0 align='absmiddle'>Скрыть</a>";
		$colorow="";
		}
		else{
		$showhide="<a href=issueshow.php$url title='Показать'>
		<img src='../utils/img/show.gif' border=0 align='absmiddle'>Показать</a>";
		$colorow="class='hiddenrow'";
		}
		echo "<tr $colorow>
	<td>".$news[$i]['name']."</td>
	<td>".$news[$i]['body']."</td>
	<td>".$news[$i]['url']."</td>
	<td class='menu'>$showhide
	<a href='issueedit.php$url' title='редактировать'>
	<img src='../utils/img/kedit.gif' border=0 align='absmiddle'>Редактировать</a>
	<a href='#' onClick=\"delete_position('issuedel.php$url','Вы действительно хотите удалить?');\" title='Удалить новость'>
	<img src='../utils/img/editdelete.gif' border=0 align='absmiddle'>Удалить</a></td>
	</tr>";
	}
	?>
	</table>
	<?php
	}
echo $obj
?>
<table width=100% border="0" cellpadding="0" cellspacing="0">
<tr>
<td width=50% class='menu_right'>
<?
    // Добавить блок
    echo "<a href=issueadd.php?page=$_GET[page]
             title='Добавить статью'>
		<img border=0 src='../utils/img/add.gif' align='absmiddle' />
             Добавить статью</a>";
?>
</td>
<td width=50%>
</td>
</tr>
</table>
<?
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");

echo "";
?>