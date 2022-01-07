var tokenEndPoint = "http://localhost/EscalaFlex/trabalho/auth";

function buscarToken() {

    var email = document.querySelector("#email").value;
    var senha = document.querySelector("#senha").value;

    if(email != "" && senha != "") {
        
        dados = {
            email:email,
            senha:senha,
        };

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            if (this.readyState === 4 && this.status === 401) {
                document.querySelector("#mensagem").innerHTML = "Erro no usuário e/ou senha!";  
                   
            } else {
                if (this.readyState === 4 && this.status === 201) {
                    retorno = JSON.parse(this.responseText);
                    // armazena o token em uma session storage
                    sessionStorage.setItem('token', retorno.token);
                    // redireciona para a página de CRUD
                    window.location.href = "index.php";
                }
            }
        };
        xhttp.open("POST", tokenEndPoint, true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(JSON.stringify(dados));
    
    } else {
        document.querySelector("#mensagem").innerHTML = "Por favor, preencha todos os campos";        
    }
}

document.querySelector("#buscarTokenBtn").addEventListener("click", function(){ buscarToken() });


