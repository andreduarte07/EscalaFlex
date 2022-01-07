// validar se a sessão está ativa
function validaAcesso() {
    // TO DO: validar se o token realmente existe e é VÁLIDO!
    // Neste exemplo apenas valida se está nulo ou não
    if(sessionStorage.getItem('token') == null) {
        // redirecionar para a página de login
        location.href = "http://localhost/EscalaFlex/escalaflex-client/login.php";
    }
}

// destruir a sessão ativa
function encerraAcesso() {
    // TO DO: apagar o token do banco de dados
    // Apagando o token da sessão local do navegador
    sessionStorage.clear();
    location.href = "login.php";
}

// chamar a função para validar o acesso
validaAcesso();

document.querySelector("#logoutBtn").addEventListener("click", function(){ encerraAcesso() });
