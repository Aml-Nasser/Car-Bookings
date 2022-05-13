<?php
class connect{
    protected $username ='root';
    protected $password ='';
    protected $servername ='localhost';
    protected $database = 'cars';

    public function connection(){
        $connect_db = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if(mysqli_connect_error()){
            printf("connection failed :%s", mysqli_connect_error());
            exit();

        }
        return $connect_db;
    }
}
?>
