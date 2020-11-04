function buscarMensagens(){

  var request = new XMLHttpRequest();
  var url = "../processador.php?action=getMessages";

  request.open("GET", url, true);

  request.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      let response = JSON.parse(this.responseText);
      
      let html = "";
     response.forEach(function(resp){
      html += `${resp.usuario}: ${resp.mensagem} <img src="./images/icon_edit.png" class="icon-chat" onclick="editarMensagem(${resp.id})"><br/>`
     })

      document.getElementById("mensagens").innerHTML =html;

    }
  }

  request.send();

}

function buscarMensagem(id){

  var request = new XMLHttpRequest();
  var url = `../processador.php?action=getMessage&messageId=${id}`;

  request.open("GET", url, true);

  request.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      let response = JSON.parse(this.responseText);
      
      document.getElementById("input_mensagem").value = resp.mensagem;

    /*  let html = "";
     response.forEach(function(resp){
      html += `${resp.usuario}: ${resp.mensagem} <img src="./images/icon_edit.png" class="icon-chat" onclick="editarMensagem(${resp.id})"><br/>`
     })

      document.getElementById("mensagens").innerHTML =html;
*/
    }
  }

  request.send();

}

function atualizaSozinho(){
  setInterval(buscarMensagens, 1500);
}


function enviarMensagem(){

  var request = new XMLHttpRequest();
  var url = "../processador.php";

  request.open("POST", url, true);
  
  let mensagem = document.getElementById('input_mensagem').value;
  let nome = document.getElementById('input_nome').value;

  let form = new FormData();
  form.append('mensagem' , mensagem);
  form.append('nome',nome)
  form.append('action' , 'inserir');

  request.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      let response = JSON.parse(this.responseText);
      
    let html = document.getElementById("mensagens").innerHTML;
    if(response) {
      html += `${nome}: ${mensagem}<br/>`
    }
    
      document.getElementById("mensagens").innerHTML = html;
      document.getElementById("input_mensagem").value = "";

    }
  }

  request.send(form);

}

function editarMensagem(id){
  buscarMensagem(id);
}