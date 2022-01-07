class Colaborador{
    constructor(nome, cargo, posicao, entrada, intervalo, bancoDeHoras, observacoes){
        this.nome = nome
        this.cargo = cargo
        this.posicao = posicao
        this.entrada = entrada
        this.intervalo = intervalo
        this.bancoDeHoras = bancoDeHoras
        this.observacoes = observacoes
    }
}


function montaTabela(){
    let request = new XMLHttpRequest();
    request.open("get", "https://jsonplaceholder.typicode.com/todos/1");
    request.addEventListener("load", function(){
        if(this.status == 200){
            let responseText = this.responseText
            console.log(responseText);
            responseObj = JSON.parse(responseText)
            console.log(responseObj);
        };
        
    });
    request.send();


    tbody = document.querySelector("table tbody");
    //Mocking the table json
    tabelaObj = [new Colaborador("Amanda Silveira", "Operador(a) de Caixa", "Frente A-01", "07:20", "12:20", 10, ["ocorrencia 1", "ocorrencia 2"]) , new Colaborador("Alceni de Souza Teixeira", "Operador(a) de Caixa", "Frente A-02", "07:20", "12:20", "05:00", [])];
    console.log(tabelaObj);

    tbody.innerHTML = "";

    tabelaObj.forEach(function(colaborador){
        tr = montaTr(colaborador);
        console.log(tr);
        
        tbody.appendChild(tr);
    });
}

function montaTr(colaborador){
    tr = document.createElement("tr");

    tdNome = document.createElement("td");
    tdCargo = document.createElement("td");
    tdPosicao = document.createElement("td");
    tdEntrada = document.createElement("td");
    tdIntervalo = document.createElement("td");
    tdBancoHoras = document.createElement("td");
    tdObservacoes = document.createElement("td");

    nodes = [tdNome, tdCargo, tdPosicao, tdEntrada, tdIntervalo, tdBancoHoras, tdObservacoes]

    tdNome.classList.add("name-column");
    tdCargo.classList.add("role-column");
    tdPosicao.classList.add("position-column");

    tdNome.textContent = colaborador.nome;
    tdCargo.textContent = colaborador.cargo;
    tdPosicao.textContent = colaborador.posicao;
    tdEntrada.textContent = colaborador.entrada;
    tdIntervalo.textContent = colaborador.intervalo;
    tdBancoHoras.textContent = colaborador.bancoDeHoras;
    tdObservacoes.tectContent = colaborador.observacoes;


    let iconTag = document.createElement("i");
    
    if (colaborador.bancoDeHoras > 0){
        iconTag.classList.add("fas", "text-warning", "fa-plus-circle")
    } else if (colaborador.bancoDeHoras < 0) {
        iconTag.classList.add("fas", "text-danger", "fa-minus-circle")
    } else{
        iconTag.classList.add("fas", "text-success", "fa-check-circle")
    }


    colaborador.observacoes.forEach(function(observacao){
        spanObservacao = document.createElement("span");
        spanObservacao.classList.add("badge", "badge-danger", "float-right", "mx-1");
        spanObservacao.dataset.toggle = "tooltip";
        spanObservacao.dataset.placement = "top"
        spanObservacao.title = observacao;

        iconeObservacao = document.createElement("i")
        iconeObservacao.classList.add("fas", "fa-exclamation-triangle", "text-white")

        spanObservacao.appendChild(iconeObservacao);
        tdObservacoes.appendChild(spanObservacao);
    });


    tdBancoHoras.appendChild(iconTag);

    nodes.forEach(function(td){
        tr.appendChild(td);
    });

    

    return tr;
}