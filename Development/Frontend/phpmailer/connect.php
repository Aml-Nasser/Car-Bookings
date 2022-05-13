<?php
//session_start();
class connect{
PROTECTED $username='root';
PROTECTED $password='';
PROTECTED $servername='localhost';
PROTECTED $database='cars';

public function connection (){
	$connect_db=new mysqli($this->servername,$this->username,$this->password,$this->database);
	if (mysqli_connect_errno ()){
		printf("connection failed :%s",mysqli_connect_error ());
		exit ();

	}
	return $connect_db;
}

}

