<?php require_once('templates/top.php');
	$name=new field_text('name',
'Логин',
true,
$_POST['name']);
	$email=new field_text_email('email',
'email',
true,
$_POST['email']);
	$pass=new field_password('pass',
'пароль',
true,
$_POST['pass']);
	$passagain=new field_password('passagain',
'подтверждение пароля',
true,
$_POST['passagain']);
	$form=new form(array('name'=>$name,
'email'=>$email,
'pass'=>$pass,
'passagain'=>$passagain),
'регистрация', 'field');
if ($_POST){

$error=$form->check();
//проверка пароля и логина
if ($form->fields['pass']->value!=
$form->fields['passagain']->value)
{
$error[]='пароль не совпадает';
}
$query= "SELECT COUNT(*) FROM $tbl_users WHERE username='{$form->fields['name']->value}'";
$usr=mysql_query($query);
if(!$usr){
exit($query);
}
if(mysql_result($usr, 0)){
$error[]='Такой логин существует';
}
if(!$error){
$query="INSERT INTO $tbl_users VALUES (NULL,
'{$form->fields['name']->value}',
'{$form->fields['pass']->value}',
'{$form->fields['email']->value}',
NOW(),
NOW(),
'unblock')";

$cat=mysql_query($query);
if(!$cat){
exit($query);}
?>
<script>document.location.href='auth.php';
</script>
<?php
}
if($error){
foreach ($error as $err){
echo "<span style='color:red'>";
echo $err;
echo "</span><br />";
} 
}
}

$form->print_form();

require_once('templates/bottom.php');
?>