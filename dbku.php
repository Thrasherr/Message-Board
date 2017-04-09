<?php
class db{
	public $user;
	public $passwd;
	public $dbname;
	public $host;
	public $dblink;
	public $sql;
	
	function __construct($host, $user, $passwd, $dbname) //数据库类的构造函数
	{
		$this->host = $host;
		$this->user = $user;
		$this->passwd = $passwd;
		$this->dbname = $dbname;
		$this->connect();
		$this->dblink->query("set names UTF8");
	}
	function connect()
	{
		$mysqli = new mysqli($this->host, $this->user, $this->passwd, $this->dbname);
		$this->dblink = $mysqli;
	}
	function query($sql, $resultmode = MYSQLI_STORE_RESULT) //sql查询
	{
		return $this->dblink->query($sql); //执行一次操作
	}
	function close() //关闭数据库
	{
		$this->dblink->close();
	}
	function connect_errno() //判断连接是否成功
	{
		if ($this->dblink->connect_errno != 0)
        {
            echo "连接失败".$this->dblink->connect_error;
		    exit;
        }
	}
}
?>