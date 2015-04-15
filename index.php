<?php require_once('templates/top.php');
?>
	<?php
if($_GET['url']){
$file=$_GET['url'];}
else{
$file='index';}
$query="SELECT * FROM $tbl_issue WHERE url='$file'";
$adr=mysql_query($query);
	if(!$adr){
	exit($query);
	}
$text=mysql_fetch_array($adr);
?>	
<h3><?php echo $text['name'];?></h3>
<?php echo $text['body'];?>
<?php require_once('templates/bottom.php');?>