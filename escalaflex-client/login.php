<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Import dos estilos do Bootstrap -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <!-- Import do FontAwesome -->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="resources/css/login.css">
</head>
<body>
    <main class="login-container text-white">
        <h1 class="title mb-4">ESCALA<span class="orange-title">FLEX</span></h1>
        <section id="login">
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email" class="form-control mb-3" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control mb-3" required>


            <button id="buscarTokenBtn" value="Entrar" class="btn btn-block col-4 bg-white my-5 mx-auto">Enviar</button>
            

            </section>
    </main>

    <!-- Import dos JS de terceiros -->
    <script src="resources/js/auth.js"></script>
    

</body>
