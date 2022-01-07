var url = "http://localhost/EscalaFlex/trabalho/unidades";



var body = document.querySelector("body");
body.onload = function () {
    carregarTabela();
}

var form = document.querySelector("#formulario");

form.onsubmit = function(event){
    event.preventDefault();
 
    // Criação de um objeto JSON
    var unidade = {};
    // var horario = {};
    // var sabados = {};
    // var domingos = {};
    

    // Cada atributo busca por JS o ID do input e associa ao valor digitado 
    unidade.fk_Categoria = document.querySelector("#categoria").value;
    unidade.nome = document.querySelector("#unidade").value;
    unidade.endereco = document.querySelector("#endereco").value;
    unidade.telefone = document.querySelector("#telefone").value;
    unidade.cep = document.querySelector("#cep").value;
    unidade.email = document.querySelector("#email").value;
    unidade.responsavel = document.querySelector("#responsavel").value;
    unidade.cidade = document.querySelector("#cidade").value;
    unidade.estado = document.querySelector("#estado").value;
    var id = document.querySelector("#txtid").value;
    // horario.codDia = 1;
    // horario.hrAbertura = document.querySelector("#abertura-semanal").value;
    // horario.hrFechamento = document.querySelector("#fechamento-semanal").value;
    
    // sabados.codDia = 2;
    // sabados.hrAbertura = document.querySelector("#abertura-sabados").value;
    // sabados.hrFechamento = document.querySelector("#fechamento-sabados").value;
    
    // domingos.codDia = 3;
    // domingos.hrAbertura = document.querySelector("#abertura-domingos").value;
    // domingos.hrFechamento = document.querySelector("#fechamento-domingos").value;
    



    // Atributo ID só vai ter valor quando for um caso de EDIÇÃO (PUT)
    // Quando for um caso de CRIAÇÃO (POST) será nulo
    var id = document.querySelector("#txtid").value;
    
    // Se o ID estiver vazio então é uma CRIAÇÃO (POST)
    // Se o ID *não* estiver vazio então é uma EDIÇÃO (PUT) e precisa do ID
    if(id == ""){
        enviarUnidade(unidade);
        // enviarHorario(horario);
        // enviarSabados(sabados);
        // enviarDomingos(domingos);
    }else
        atualizarDadosUnidade(unidade, id);

    }



// Processo de inserção de dados digitados no formulário
// Método POST
function enviarUnidade(unidade){
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


function editarUnidade(id) {

    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var unidade = JSON.parse(this.responseText);
            unidade.fk_Categoria = document.querySelector("#categoria").value = unidade.fk_Categoria;
            unidade.nome = document.querySelector("#unidade").value = unidade.nome;
            unidade.endereco = document.querySelector("#endereco").value = unidade.endereco;
            unidade.telefone = document.querySelector("#telefone").value = unidade.telefone;
            unidade.cep = document.querySelector("#cep").value = unidade.cep;
            unidade.email = document.querySelector("#email").value = unidade.email;
            unidade.responsavel = document.querySelector("#responsavel").value = unidade.responsavel;
            unidade.cidade = document.querySelector("#cidade").value = unidade.cidade;
            unidade.estado = document.querySelector("#estado").value = unidade.estado;
            document.querySelector("#txtid").value = id;
        }
    };
    // Concatena a URL padrão do Web Service com /id
    xhttp.open("GET", url + "/" + id, true);
    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send();
}



function atualizarDadosUnidade(unidade, id){

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
    xhttp.send(JSON.stringify(unidade));
}



function limparFormulario(){
    document.querySelector("#unidade").value="";
    document.querySelector("#endereco").value="";
    document.querySelector("#telefone").value="";
    document.querySelector("#cep").value="";
    document.querySelector("#email").value="";
    document.querySelector("#responsavel").value="";
    document.querySelector("#cidade").value="";
    document.querySelector("#estado").value="";

    // document.querySelector("#abertura-semanal").value="--:--";
    //  document.querySelector("#fechamento-semanal").value="--:--";

    //  document.querySelector("#abertura-sabados").value="--:--";
    //    document.querySelector("#fechamento-sabados").value="--:--";

    // document.querySelector("#abertura-domingos").value="--:--";
    //  document.querySelector("#fechamento-domingos").value="--:--";
    

     
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

function montarTabela(unidades) {

    var str="";
    str+= "<table class='table table-striped'>";
    str+= "<thead>";
    str+= "<tr>";
    str+= "<th>Categoria</th>";
    str+= "<th>Unidade</th>";
    str+= "<th>Endereço</th>";
    str+= "<th>Telefone</th>";
    str+= "<th>CEP</th>";
    str+= "<th>E-mail</th>";
    str+= "<th>Responsavel</th>";
    str+= "<th>Cidade</th>";
    str+= "<th>Estado</th>";
    str+= "<th colspan='2'></th>";
    
    str+= "</tr>";
    str+= "</thead>";
    str+="<tbody>";
    for(var i in unidades){
        str+="<tr>";
        str+="<td class='endereco-coluna'>"+unidades[i].categoria_descricao +"</td>";
        str+="<td class='unidade-coluna'>" +unidades[i].nome+ "</td>";
        str+="<td class='endereco-coluna'>"+unidades[i].endereco+"</td>";
        str+="<td class='endereco-coluna'>"+unidades[i].telefone+"</td>";
        str+="<td class='endereco-coluna'>"+unidades[i].cep+"</td>";
        str+="<td class='endereco-coluna'>"+unidades[i].email+"</td>";
        str+="<td class='endereco-coluna'>"+unidades[i].responsavel+"</td>";
        str+="<td class='endereco-coluna'>"+unidades[i].cidade+"</td>";
        str+="<td class='endereco-coluna'>"+unidades[i].estado+"</td>";
        str+="<td onclick='editarUnidade(" + unidades[i].id + ")' class='btn-orange'>Editar</a></td>";
        str+="<td onclick='confirmarExcluir(" + unidades[i].id + ")' class='btn-red'>Excluir</a></td>";
        str+="</tr>";
        
    } 
    str+="</tbody>";
    str+= "</table>";

    var tabela = document.querySelector("#tabela");
    tabela.innerHTML = str;
}

function confirmarExcluir(id) {
    if(confirm("Tem certeza que deseja excluir ?"))
        excluirUnidade(id);
    else 
        false;
}

function excluirUnidade(id) {

    // Instancia a classe de requisições assíncronas (AJAX)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            limparFormulario();
            carregarTabela();
        }//else{
          //  {
          //      if (this.readyState === 4 && this.status === 401) {
          //          document.querySelector("#mensagem").innerHTML = "Não é possivel deletar esta unidade!";
          //          
          //  }
        //}
    //}
        
    };
    // Concatena a URL padrão do Web Servic com /id
    xhttp.open("DELETE", url + "/" + id, true);

    // AUTH: realiza a autorização com token
    xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
    xhttp.send();
}



//=================================== HORARIOS ==========================================

// function enviarHorario(horario){
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState === 4 && this.status === 201) {
//             console.log("Response recebido scuesso!");
       
//         }
//     };
//     xhttp.open("POST", url2, true);
//     xhttp.setRequestHeader("Content-Type","application/json");
//     // AUTH: realiza a autorização com token
//     //xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
//     xhttp.send(JSON.stringify(horario));
// }

// function enviarSabados(sabados){
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState === 4 && this.status === 201) {
//             console.log("Response recebido scuesso!");
       
//         }
//     };
//     xhttp.open("POST", url2, true);
//     xhttp.setRequestHeader("Content-Type","application/json");
//     // AUTH: realiza a autorização com token
//     //xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
//     xhttp.send(JSON.stringify(sabados));
// }

// function enviarDomingos(domingos){
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState === 4 && this.status === 201) {
//             console.log("Response recebido scuesso!");
       
//         }
//     };
//     xhttp.open("POST", url2, true);
//     xhttp.setRequestHeader("Content-Type","application/json");
//     // AUTH: realiza a autorização com token
//     //xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
//     xhttp.send(JSON.stringify(domingos));
// }
