<?php 

require_once "./processador.php";
?>
<html>
<head>
<link href="./styles/style.css" rel="stylesheet"/>
</head>
<body>
  <div id="batepapo">
    <div id="mensagens">
    </div>
    <div id="acoes">
      <div id="mensagem">
      <label for="input_mensagem">Mensagem:</label>
        <input type="text" id="input_mensagem" name="input_mensagem" />
      </div>
      <div id="div_botao_enviar">
        <input type="button" value="Enviar" id="botao_enviar"/>
      </div>
      <div id="botao_atualizar">
        <input type="button" value="Atualizar" onclick="buscarMensagens()"/>
      </div>
      <div id="informacoes"></div>
    </div>
  </div>
  <script src="./scripts/functions.js" type="text/javascript"></script>
</body>
</html>