<?php
require_once "./infoBD.php";

try{
  $conn = new PDO("mysql:host=$host;dbname=$db_name",$user,$senha);
  echo "Deu boa";
}catch(PDOException $e){
  die("Erro: ". $e->getMessage());
}



