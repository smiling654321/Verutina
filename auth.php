<?php require_once('templates/top.php');
		require_once('utils/utils.users.php');
		$name=new field_text('name',
							'Логин',
							true,
							$_POST['name']);
		$pass=new field_password('pass',
								'пароль',
								true,
								$_POST['pass']);
		$form=new form(array('name'=>$name,
							'pass'=>$pass,),
							'вход',
							'field');
if ($_POST){
$error=$form->check();
if(!$error){
enter($form->fields['name']->value,
		$form->fields['pass']->value);
?>
<script>document.location.href='index.php';
</script>
<?php
}
}
$form->print_form();
require_once('templates/bottom.php');
?>