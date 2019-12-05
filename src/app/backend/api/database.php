<?php

header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT,GET,POST, DELETE");
header("Acess-Control-Allow-Headers: Origin, X-Requested-Width, Content-Type, Accept");

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "gameshop");

function connect(){
  $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if(mysqli_connect_errno($connect)){
    die("Failed to connect:". mysqli_conn_error());
  }

  mysqli_set_charset($connect, "utf8");
}

$con = connect();

?>
