<?php
	// header("location:http://http://127.0.0.1/Message-Board/liuyanban.php");
    include 'dbku.class.php'; 
	include 'inputpp.class.php'; //post和get的文件
	include 'config.php';

	$db = new db($host,$username,$password,$dbname);
	$PG = new PG;
	$user = $PG->post('user');
	$content = $PG->post('content');

	$db->connect_errno();

	$intime = time();//获得一个时间戳 time是php内置函数
	
	$sql = "INSERT INTO messages (id,nick,content,intime) VALUES (NULL,'$user','$content','$intime')"; //插入sql
	$db->query($sql);


?>