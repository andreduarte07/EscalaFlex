 var url = "http://localhost/EscalaFlex/trabalho/horarios";


var body = document.querySelector("body");
body.onload = function () {
    carregarTabela();
}

var form = document.querySelector("#formulario");

form.onsubmit = function(event){
    event.preventDefault();
 
    // Criação de um objeto JSON

     var horario = {};

    // Cada atributo busca por JS o ID do input e associa ao valor digitado 

    horario.hrAberturaSemanal = document.querySelector("#abertura-semanal").value;
    horario.hrFechamentoSemanal = document.querySelector("#fechamento-semanal").value;
    
    horario.hrAberturaSabado = document.querySelector("#abertura-sabados").value;
    horario.hrFechamentoSabado = document.querySelector("#fechamento-sabados").value;
    
    horario.hrAberturaDomingo = document.querySelector("#abertura-domingos").value;
    horario.hrFechamentoDomingo = document.querySelector("#fechamento-domingos").value;
    horario.fk_idUnidade = document.querySelector("#unidade").value;
    



    // Atributo ID só vai ter valor quando for um caso de EDIÇÃO (PUT)
    // Quando for um caso de CRIAÇÃO (POST) será nulo
    var id = document.querySelector("#txtid").value;
    
    // Se o ID estiver vazio então é uma CRIAÇÃO (POST)
    // Se o ID *não* estiver vazio então é uma EDIÇÃO (PUT) e precisa do ID
    if(id == ""){
     
         enviarHorario(horario);
   
    }else
        atualizarDadosHorario(horario, id);

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


        
    function enviarHorario(horario){
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
        xhttp.send(JSON.stringify(horario));
    }

    
    function editarHorario(id) {

        // Instancia a classe de requisições assíncronas (AJAX)
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var horario = JSON.parse(this.responseText);
                horario.hrAberturaSemanal = document.querySelector("#abertura-semanal").value = horario.hrAberturaSemanal;
                horario.hrFechamentoSemanal = document.querySelector("#fechamento-semanal").value = horario.hrFechamentoSemanal;
                
                horario.hrAberturaSabado = document.querySelector("#abertura-sabados").value = horario.hrAberturaSabado;
                horario.hrFechamentoSabado = document.querySelector("#fechamento-sabados").value = horario.hrFechamentoSabado;
                
                horario.hrAberturaDomingo = document.querySelector("#abertura-domingos").value = horario.hrAberturaDomingo;
                horario.hrFechamentoDomingo = document.querySelector("#fechamento-domingos").value = horario.hrFechamentoDomingo;           
                horario.fk_idUnidade = document.querySelector("#unidade").value = horario.fk_idUnidade;

                document.querySelector("#txtid").value = id;
            }
        };
        // Concatena a URL padrão do Web Service com /id
        xhttp.open("GET", url + "/" + id, true);
        // AUTH: realiza a autorização com token
        xhttp.setRequestHeader("Authorization", "Bearer " + sessionStorage.getItem('token'));
        xhttp.send();
    }
    
    
    
    function atualizarDadosHorario(horario, id){
    
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
        xhttp.send(JSON.stringify(horario));
    }
    

    function montarTabela(horarios) {
    
        var str="";
        str+= "<table class='table table-striped'>";
        str+= "<thead>";
        str+= "<tr>";
        str+= "<th>Unidade</th>";
        str+= "<th colspan= '2'>Semana</th>";
        str+= "<th colspan= '2'>Sabados</th>";
        str+= "<th colspan= '2'>Domingos</th>";
        str+= "<th colspan='2'></th>";
        
        str+= "</tr>";
        str+= "</thead>";
        str+="<tbody>";
        for(var i in horarios){
            str+="<tr>";
            str+="<td class='endereco-coluna'>"+horarios[i].nome +"</td>";
            str+="<td class='endereco-coluna'>"+horarios[i].hrAberturaSemanal +"</td>";
            str+="<td class='unidade-coluna'>" +horarios[i].hrFechamentoSemanal+ "</td>";
            str+="<td class='endereco-coluna'>"+horarios[i].hrAberturaSabado +"</td>";
            str+="<td class='unidade-coluna'>" +horarios[i].hrFechamentoSabado+ "</td>";         
            str+="<td class='endereco-coluna'>"+horarios[i].hrAberturaDomingo +"</td>";
            str+="<td class='unidade-coluna'>" +horarios[i].hrFechamentoDomingo + "</td>";
            str+="<td onclick='editarHorario(" + horarios[i].id + ")' class='btn-orange'>Editar</a></td>";
            str+="<td onclick='confirmarExcluir(" + horarios[i].id + ")' class='btn-red'>Excluir</a></td>";
            str+="</tr>";
            
        } 
        str+="</tbody>";
        str+= "</table>";
    
        var tabela = document.querySelector("#tabela");
        tabela.innerHTML = str;
    }
    

    function confirmarExcluir(id) {
        if(confirm("Tem certeza que deseja excluir ?"))
            excluirHorario(id);
        else 
            false;
    }
    
    function excluirHorario(id) {
    
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
    document.querySelector("#unidade").value="Selecione...";
    document.querySelector("#abertura-semanal").value ="";
    document.querySelector("#fechamento-semanal").value =="";
    
   document.querySelector("#abertura-sabados").value = "";
   document.querySelector("#fechamento-sabados").value = "";
    
    document.querySelector("#abertura-domingos").value ="";
   document.querySelector("#fechamento-domingos").value = "";;  

     
}
