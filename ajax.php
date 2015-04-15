<?
require_once('config/config.php');
$_POST['id']=intval($_POST['id']);
$query="SELECT * FROM $tbl_tovar WHERE id=".$_POST['id'];
$adr=mysql_query($query);
	if(!$adr){
	exit($query);
	}
$text=mysql_fetch_array($adr);
 echo "<div class='fon'>
	<img src='media/uploads/".$text['pictsmall']."'/>
	</div>"
	?>
<h3><?php echo $text['name'];?></h3>
<p><?php echo $text['body'];?></p>
