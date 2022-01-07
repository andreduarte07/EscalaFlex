<?php
// include para criação de conexão com banco de dados
require_once "db/PDOFactory.php";

// includes de classes
require_once "class/Unidade.php";
require_once "class/Usuario.php";
require_once "class/Horario.php";
require_once "class/Posicao.php";


// includes de DAO
require_once "dao/UnidadeDAO.php";
require_once "dao/UsuarioDAO.php";
require_once "dao/HorarioDAO.php";
require_once "dao/PosicaoDAO.php";




// includes de controllers
require_once "controllers/UnidadeController.php";
require_once "controllers/UsuarioController.php";
require_once "controllers/HorarioController.php";
require_once "controllers/PosicaoController.php";


// include de autoload do Slim
require "vendor/autoload.php";

// configuração do Slim para exibição dos detalhes na ocorrência de erros
$config = [
	'settings'             => [
		'displayErrorDetails' => true,
		'addContentLengthHeader' => false
	],
];
?>