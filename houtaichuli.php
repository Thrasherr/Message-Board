<?php
	header("location:http://http://127.0.0.1/Message-Board/liuyanban.php");

class GP{
	function post($key)
	{
		$value = $_POST[$key];
		return $value;
	}
}
	$input = new GP();
	$user = $input->post('user');
	$content = $input->post('content');
	
	$conn = new mysqli('127.0.0.1', 'root', '', 'vanstt');
	$conn->query("set names UTF8");

	if ($conn->connect_errno != 0)
	{
		echo "连接失败".$conn->connect_error;
		exit;
	}
	$intime = time();//获得一个时间戳 time是php内置函数
	
	$sql = "INSERT INTO messages (id,nick,content,intime) VALUES (NULL,'$user','$content','$intime')"; 

	if ($conn->query($sql))
	{
		echo "SQL执行成功";
	}
	else
	{
		echo "SQL执行失败";
		exit;
	}
	echo "<hr />";
?>
