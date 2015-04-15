<?php 
	$dblocation='localhost';
	$dbname='E.Verutina';
	$dbuser='root';
	$dbpass='';
	//таблицы
	$tbl_news='news';
	$tbl_issue='issues';
	$tbl_tovar='tovars';
	$tbl_categories='categories';
	$tbl_accounts='system_accounts';
	$tbl_maintext='maintexts';
	$tbl_catalog='catalog';
	$dbcnx=mysql_connect($dblocation,$dbuser,$dbpass);
	if(!$dbcnx){
		exit('No connect to server Mysql');
		}
	$dbuse=mysql_select_db($dbname,$dbcnx);
		if(!$dbuse){
		exit('no db');
		}
	@mysql_query("SET NAMES 'utf8'");
	$tbl_users='users';
	