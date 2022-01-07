var url = "http://localhost/EscalaFlex/trabalho/usuarios";


var body = document.querySelector("body");
body.onload = function () {
    carregarTabela();
}


var form = document.querySelector("#formulario");


form.onsubmit = function(event){
    event.preventDefault();
 
    // Criação de um objeto JSON
    var usuario = {};

    // Cada atributo busca por JS o ID do input e associa ao valor digitado 
    usuario.nome = document.querySelector("#nome").value;
    usuario.email = document.querySelector("#email").value;
    usuario.senha = document.querySelector("#senha").value;
    usuario.status = document.querySelector("#status").value;
    usuario.matricula = document.querySelector("#matricula").value;
    var id = document.querySelector("#txtid").value;

    // Atributo ID só vai ter valor quando for um caso de EDIÇÃO (PUT)
    // Quando for um caso de CRIAÇÃO (POST) será nulo
    var id = document.querySelector("#txtid").value;
    
    // Se o ID estiver vazio então é uma CRIAÇÃO (POST)
    // Se o ID *não* estiver vazio então é uma EDIÇÃO (PUT) e precisa do ID
    if(id == ""){
        enviarUsuario(usuario);
    }else
        atualizarDadosUsuario(usuario, id);

    }

// Processo de inserção de dados digitados no formulário
// Método POST
function enviarUsuario(unidade){
    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 201) {
            console.log("Response recebido!");
            limparFormulario();
            carregarTabela();
        }
    };
    xhttp.open("POST", url, true);
    // Passando um cabeçalho com tipo de dados JSON
    xhttp.setRequestHeader("Content-Type","application/json");
    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send(JSON.stringify(unidade));
}


function confirmarExcluir(id) {
    if(confirm("Tem certeza que deseja excluir ?"))
    excluirUsuario(id);
    else 
        false;
}

function excluirUsuario(id) {

    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            limparFormulario();
            carregarTabela();
        }
    };
    // Concatena a URL padrão do Web Servic com /id
    xhttp.open("DELETE", url + "/" + id, true);

    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send();
}

function carregarTabela() {
    var xhttp = new XMLHttpRequest(); 
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            montarTabela(JSON.parse(this.responseText));
        }
    };
    xhttp.open("GET", url, true);
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send();
}

function montarTabela(usuarios) {

    var str="";
    str+= "<table class='table table-striped'>";
    str+= "<thead>";
    str+= "<tr>";
    str+= "<th>Nome</th>";
    str+= "<th>E-mail</th>";
    str+= "<th>Senha</th>";
    str+= "<th>Status</th>";
    str+= "<th>Matricula</th>";
    str+= "<th colspan='2'></th>";
    str+= "</tr>";
    str+= "</thead>";
    str+="<tbody>";
    for(var i in usuarios){
        str+="<tr>";
        str+="<td class='unidade-coluna'>" +usuarios[i].nome+ "</td>";
        str+="<td class='endereco-coluna'>"+usuarios[i].email+"</td>";
        str+="<td class='endereco-coluna'>"+usuarios[i].senha+"</td>";
        if(usuarios[i].status == 1){
            usuarios[i].status = 'Ativo';
           
        }else{
            usuarios[i].status = 'Inativo';
        }
        str+="<td class='endereco-coluna'>"+usuarios[i].status+"</td>";
        str+="<td class='endereco-coluna'>"+usuarios[i].matricula+"</td>";
        str+="<td onclick='editarUsuario(" + usuarios[i].id + ")' class='btn-orange'>Editar</a></td>";
        str+="<td onclick='confirmarExcluir(" + usuarios[i].id + ")' class='btn-red'>Excluir</a></td>";
        str+="</tr>";
        
    } 
    str+="</tbody>";
    str+= "</table>";

    var tabela = document.querySelector("#tabela");
    tabela.innerHTML = str;
}


function editarUsuario(id) {

    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var usuario = JSON.parse(this.responseText);
            usuario.nome = document.querySelector("#nome").value = usuario.nome;
            usuario.email = document.querySelector("#email").value = usuario.email;
            usuario.senha = document.querySelector("#senha").value = usuario.senha;
            usuario.status = document.querySelector("#status").value = usuario.status;
            usuario.matricula = document.querySelector("#matricula").value = usuario.matricula;
            document.querySelector("#txtid").value = id;
        }
    };
    // Concatena a URL padrão do Web Service com /id
    xhttp.open("GET", url + "/" + id, true);
    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send();
}


function limparFormulario(){
    document.querySelector("#nome").value="";
    document.querySelector("#email").value="";
    document.querySelector("#senha").value="";
    document.querySelector("#status").value="";
    document.querySelector("#matricula").value="";
     
}

function atualizarDadosUsuario(usuario, id){

    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
    
       if (this.readyState === 4 && this.status === 200) {            
            console.log("Response recebido!");
            limparFormulario();
            carregarTabela();
        }
    };
    // Concatena a URL padrão do Web Service com /id
    xhttp.open("PUT", url + "/" + id, true);
    xhttp.setRequestHeader("Content-Type","application/json");
    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send(JSON.stringify(usuario));
}