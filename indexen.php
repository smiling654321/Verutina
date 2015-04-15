<?php require_once('templates/top.en.php');
?>
	<a href='index.php?url=<?php echo $_GET['url']?>'>Русский</a>
	<?php
if($_GET['url']){
$file=$_GET['url'];}
else{
$file='index';}
$query="select * from $tbl_maintext where url='$file' AND lang='en'";
$adr=mysql_query($query);
	if(!$adr){
	exit($query);
	}
$text=mysql_fetch_array($adr);
?>	
<h5><?php echo $text['name'];?></h5>
<?php echo $text['body'];?>
<?php require_once('templates/bottom.en.php');?>