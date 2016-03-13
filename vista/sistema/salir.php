<?php
session_start();
$destroy= session_destroy();
if($destroy){
header("Location: ../../index.php");
}

?>