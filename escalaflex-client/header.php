<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESCALAFLEX</title>

    <!-- Import dos estilos do Bootstrap -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <!-- Import do FontAwesome -->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="resources/css/geral.css">
    <link rel="stylesheet" href="resources/css/tabelas.css">
    <link rel="stylesheet" href="resources/css/formulariounidades.css">
    <link rel="stylesheet" href="resources/css/dashboard.css">


</head>

<body>
    <header class="header bg-dark">
        <div class="bg-bronze">
            <div class="dropdown container d-flex justify-content-end align-items-center">
                <a class="account-management-link btn btn-sm dropdown-toggle m-0 p-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Aline de Campos
                </a>
                
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Meus Dados</a>
                    <a class="dropdown-item" href="#">Configurações</a>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark container">
            <h1 class="text-light mr-auto header-title pr-4">ESCALA<span class="text-orange">FLEX</span></h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav border-right col justify-content-around align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex align-items-center" href="index.php"><i class="fas fa-columns mr-2"></i>Painel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex align-items-center" href="escalasemanal.php"><i class="fas fa-calendar-alt mr-2"></i>Escala Semanal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex align-items-center" href="escaladiaria.php"><i class="fas fa-calendar-check mr-2"></i>Escala Diária</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex align-items-center" href="colaboradores.php"><i class="fas fa-user-friends mr-2"></i>Colaboradores</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-database mr-2"></i>Gestão de Dados
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="unidades.php">Unidade</a>
                            <a class="dropdown-item" href="categorias.php">Categoria</a>
                            <a class="dropdown-item" href="posicoes.php">Posições</a>
                            <a class="dropdown-item" href="usuarios.php">Usuários</a>
                            <a class="dropdown-item" href="horarios.php">Horarios</a>

                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cargos.php">Cargos</a>
                            <a class="dropdown-item" href="lotacoes.php">Lotações</a>
                            <a class="dropdown-item" href="pontos.php">Ponto</a>
                        </div>
                    </li>
                </ul>
                <div class="nav-item d-flex flex-column flex-lg-row align-items-center justify-content-between pl-3">
                    <span class="navbar-text text-white"><b>Unidade: </b>Rui Barbosa</span>
                    <a href="#" class="small nav-link text-white d-flex align-items-center px-0 col-4"><i class="fas fa-undo bg-white text-dark rounded-circle p-1 m-2"></i>Trocar Unidade</a>
                </div>
            </div>
        </nav>
    </header>
    