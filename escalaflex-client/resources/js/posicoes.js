var url = "http://localhost/EscalaFlex/trabalho/posicoes";

var form = document.querySelector("#form");

var body = document.querySelector("body");
body.onload = function () {
    carregarTabela();
}

form.onsubmit = function(event){
    event.preventDefault();
 
 
    var posicao = {};


    // Cada atributo busca por JS o ID do input e associa ao valor digitado 
    posicao.descricao = document.querySelector("#posicao").value;
    posicao.fk_idUnidade = document.querySelector("#unidade").value;
    var id = document.querySelector("#txtid").value;

    // Atributo ID só vai ter valor quando for um caso de EDIÇÃO (PUT)
    // Quando for um caso de CRIAÇÃO (POST) será nulo
    var id = document.querySelector("#txtid").value;
    
    // Se o ID estiver vazio então é uma CRIAÇÃO (POST)
    // Se o ID *não* estiver vazio então é uma EDIÇÃO (PUT) e precisa do ID
    if(id == ""){
        enviarPosicao(posicao);
 
    }else
        atualizarDadosPosicao(posicao, id);

    }

    function editarPosicao(id) {

        // Instancia a classe de requisições assíncronas (AJAX)
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var posicao = JSON.parse(this.responseText);
                posicao.descricao = document.querySelector("#posicao").value = posicao.descricao;
                posicao.fk_idUnidade = document.querySelector("#unidade").value = posicao.fk_idUnidade;
                document.querySelector("#txtid").value = id;
            }
        };
        // Concatena a URL padrão do Web Service com /id
        xhttp.open("GET", url + "/" + id, true);
        // AUTH: realiza a autorização com token
        xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
        xhttp.send();
    }
    
    
    
    function atualizarDadosPosicao(posicao, id){
    
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
        xhttp.send(JSON.stringify(posicao));
    }
    
    



function enviarPosicao(posicao){
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
    xhttp.send(JSON.stringify(posicao));
}

function carregarTabela() {
    var xhttp = new XMLHttpRequest(); 
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            montarTabela(JSON.parse(this.responseText));
            limparFormulario();
        }
    };
    xhttp.open("GET", url, true);
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));

    xhttp.send();

}


function montarTabela(posicoes) {

    var str="";
    str+= "<table class='table table-striped'>";
    str+= "<thead>";
    str+= "<tr>";

    str+= "<th>Posição</th>";
    str+= "<th>Unidade</th>";
    str+= "<th colspan='2'></th>";


    str+= "</tr>";
    str+= "</thead>";
    str+="<tbody>";
    for(var i in posicoes){
        str+="<tr>";
        str+="<td class='unidade-coluna'>" +posicoes[i].descricao+ "</td>";
        str+="<td class='endereco-coluna'>"+posicoes[i].nome+"</td>";
        str+="<td onclick='editarPosicao(" + posicoes[i].id + ")' class='btn-orange'>Editar</a></td>";
        str+="<td onclick='confirmarExcluir(" + posicoes[i].id + ")' class='btn-red'>Excluir</a></td>";
        str+="</tr>";
        
    } 
    str+="</tbody>";
    str+= "</table>";

    var tabela = document.querySelector("#tabela");
    tabela.innerHTML = str;
}

function confirmarExcluir(id) {
    if(confirm("Tem certeza que deseja excluir ?"))
        excluirPosicao(id);
    else 
        false;
}

function excluirPosicao(id) {

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


function limparFormulario(){
    document.querySelector("#posicao").value="";
    document.querySelector("#unidade").value="Selecione...";
    

     
}
