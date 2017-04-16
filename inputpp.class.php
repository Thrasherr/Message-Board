<?php
class PG {
	function post($key) //post传值
	{
		@$value = $_POST[$key];
		return @$value;
	}
	function get($key) //get传值
	{
		@$value = $_GET[$key];
		return @$value;
	}
}

?>