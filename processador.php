<?php
require_once "./infoBD.php";


try{
  $conn = new PDO("mysql:host=$host;dbname=$db_name",$user,$senha);
  
  if(isset($_GET['action']) && $_GET['action'] == "getMessages"){
    buscarMensagens($conn);
  }

  if(isset($_GET['action']) && $_GET['action'] == "getMessage"){
    buscarMensagem($conn, $_GET['id']);
  }


  if(isset($_POST['action']) && $_POST['action'] == "inserir"){
    inserirMensagem($conn, $_POST);
  }
  

}catch(PDOException $e){
  die("Erro: ". $e->getMessage());
}



function buscarMensagens($conn){
  
  $mensagens = $conn->query("SELECT * FROM mensagens WHERE foi_deletado = 0");
  echo json_encode($mensagens->fetchAll());

};

function buscarMensagem($conn, $id){

  $parametros = array(
    ':id' => $id,
    ':foi_deletado' => 0
  );
  
  $mensagens = $conn->query("SELECT * FROM mensagens WHERE foi_deletado = :foi_deletado AND id = :id");
  echo json_encode($mensagens->fetchAll());

};

function inserirMensagem($conn, $dados){
  $parametros = array(
    ':mensagem' => $dados['mensagem'],
    ':usuarioBacana' => $dados['nome'],
    ':datahora' => '2020-11-03 21:05:00',
    ':foi_deletado' => 0
  );

  $stmt = $conn->prepare("INSERT INTO mensagens (usuario, mensagem, datahora, foi_deletado) VALUES (:usuarioBacana, :mensagem, :datahora, :foi_deletado)");
  $ret = $stmt->execute($parametros);

  echo json_encode($ret);

}





