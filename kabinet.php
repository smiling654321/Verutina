<?php require_once('templates/top.php');
if($_SESSION['id_user_position']){
$query="SELECT * FROM $tbl_users WHERE id=".$_SESSION['id_user_position'];
$inf=mysql_query($query);
	if(!$inf){
	exit($query);
	}
$text=mysql_fetch_array($inf);
?>
<h5><?php echo $text['username'];?></h5>
<br>
<?php echo $text['email'];?><br>
<?php echo $text['lastvisit'];?>
<?php
}
else{
echo 'ошибка входа';
}
require_once('templates/bottom.php');
?>