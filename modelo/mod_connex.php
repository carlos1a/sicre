<?php
class Connex{
    private $user;
    private $clave;
    private $servidor;
    private $db;
    private $port;
    private $pgconn;

public function conectar()
    {
        $this->user = 'postgres';
        $this->clave='Fabiana1a';
        $this->servidor ='localhost';
        $this->db = 'sicre';
        $this->port = 5432;
        $this->pgconn='';


        $this->pgconn = pg_connect("host=".$this->servidor." port=".$this->port." password=".$this->clave." user=".$this->user." dbname=".$this->db) or die("ERROR DE CONEXION");
        $pgconn = $this->pgconn;
        $_SESSION['pgconn']=$pgconn;
        return $this->pgconn;
    }
}
?>