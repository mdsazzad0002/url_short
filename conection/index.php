<?php
class connection{
	public $host= 'localhost';
	public $username='root';
	public $password='';
	public $dbname='url_short';

	function __construct()
	{
		$con=mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
		
	}
}
?>

