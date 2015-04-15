<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем классы формы
  require_once("../../config/class.config.dmn.php");
 require_once("../../utils/utils.resizeimg.php");
  // Включаем завершение страницы
  require_once("../utils/top.php");
  if(empty($_POST))
  {
    // Отмечаем флажок hide
    $_REQUEST['hide'] = true;
  }
  try
  {
  $query= "SELECT * FROM $tbl_categories WHERE showhide='show'";
  $cat=mysql_query($query);
  if(!$cat){
  exit($query);
  }
  $catalog=array();
  while ($cats=mysql_fetch_array($cat)){
  $catalog[$cats['id']]=$cats['name'];
  }
      $name        = new field_text("name",
                                  "Название",
                                  true,
                                  $_POST['name']);
	 $price        = new field_text("price",
                                  "Цена",
                                  true,
                                  $_POST['price']);
	$editor1        = new field_textarea("editor1",
                                  "Содержание",
                                  true,
                                  $_POST['editor1']);
    $hide        = new field_checkbox("hide",
                                      "Отображать",
                                      $_REQUEST['hide']);
	$razdel		=new field_select("razdel",
									"категория",
									$catalog,
									$_POST['razdel']);
	$urlpict	=new field_file('urlpict',
									'фото',
									false,
									$_FILES,
									'../../media/uploads');
      $form = new form(array(
	                       "name" => $name, 
						   "price" => $price, 
                           "editor1" => $editor1,
                           "hide" => $hide,
						    "razdel" => $razdel,
							"urlpict" => $urlpict), 
                     "Добавить",
                     "field");

    // Обработчик HTML-формы
    if(!empty($_POST))
    {
	$error=$form->check();
	if(!$error){
		if ($form->fields['hide']->value){
		  $showhide='show';
		}else{
		  $showhide='hide';
	    }
	$var=$form->fields['urlpict']->get_filename();
			if($var){
				$picture=date('y_m_d_h_i_').$var;
				$picturesmall="s_".$picture;
				resizeimg("../../media/uploads/".$picture,
							"../../media/uploads/".$picturesmall,
							200,
							200);
			}
			else{
			$picture='-';
			$picturesmall='-';
			}
		$query="INSERT INTO $tbl_tovar VALUES( NULL,
											'{$form->fields['name']->value}',
											'{$form->fields['editor1']->value}',
											'$picture',
											'$picturesmall',
											'{$form->fields['price']->value}',
											'$showhide',
											'{$form->fields['razdel']->value}')";	
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
