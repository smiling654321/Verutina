<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем классы формы
  require_once("../../config/class.config.dmn.php");
   require_once("../utils/top.php");

  if(empty($_POST))
  {
    // Отмечаем флажок hide
    $_REQUEST['hide'] = true;
  }
  try
  {
    $name        = new field_text("name",
                                  "Название",
                                  true,
                                  $_POST['name']);
	$editor1        = new field_textarea("editor1",
                                  "Содержание",
                                  true,
                                  $_POST['editor1']);
   
	$urlname		=new field_text("urlname",
									"Адресс URL",
									true,
									$_POST['urlname']);
	$hide        = new field_checkbox("hide",
                                      "Отображать",
                                      $_REQUEST['hide']);
	
      $form = new form(array(
	                       "name" => $name, 
						   "editor1" => $editor1,
                           "urlname" => $urlname,
						   "hide" => $hide,), 
                     "Добавить",
                     "field");

    // Обработчик HTML-формы
    if(!empty($_POST))
    {
      // Проверяем корректность заполнения HTML-формы
      // и обрабатываем текстовые поля
      $error = $form->check();
	  if(!$error){
		if ($form->fields['hide']->value){
		  $showhide='show';
		}else{
		  $showhide='hide';
	    }
        // Формируем SQL-запрос на добавление
        // новостного сообщения
        $query = "INSERT INTO $tbl_issue
                  VALUES (NULL,
                          '{$form->fields[name]->value}',
                          '{$form->fields[editor1]->value}',
						  '{$form->fields[urlname]->value}',
                          NOW(),
                          '$showhide')";
       $cat=mysql_query($query);
		if(!$cat){
		exit ($query);
		}
		?>
		<script>document.location.href='index.php';</script>
		<?
	  }	
   }
    
    // Выводим HTML-форму 
    $form->print_form();
?>
</div>
<?
  }
  catch(ExceptionObject $exc) 
  {
    require("../utils/exception_object.php"); 
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
  catch(ExceptionMember $exc)
  {
    require("../utils/exception_member.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");
?>
