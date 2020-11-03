<?php
require_once "./infoBD.php";


try{
  $conn = new PDO("mysql:host=$host;dbname=$db_name",$user,$senha);
  if(isset($_GET['action']) && $_GET['action'] == "getMessages"){
    buscarMensagens($conn);
  }
  

}catch(PDOException $e){
  die("Erro: ". $e->getMessage());
}



function buscarMensagens($conn){
  
  $mensagens = $conn->query("SELECT * FROM mensagens WHERE foi_deletado = 0");
  echo json_encode($mensagens->fetchAll());

};





