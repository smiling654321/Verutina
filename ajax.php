<?
require_once('config/config.php');
$_POST['id']=intval($_POST['id']);
$query="SELECT * FROM $tbl_tovar WHERE id=".$_POST['id'];
$adr=mysql_query($query);
	if(!$adr){
	exit($query);
	}
$tov=mysql_fetch_array($adr);
 echo "<div class='fon'>
	<img src='media/uploads/".$tov['pictsmall']."'/>
	</div>"
	?>
	<form method='post' action='cart.php?id=<?=$tov['id']?>'>
	<input type='number' name='colvo'>
	<input type='submit' value='Добавить'>
	</form>
<h3><?php echo $tov['name'];?></h3>
<p><?php echo $tov['body'];?></p>
