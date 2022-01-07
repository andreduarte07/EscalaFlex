<?php
// inclui o cabeçalho com requires e configs

include "header.php"; 

// passar a variável $config como parâmetro da instância do Slim
$app = new \Slim\App($config);

// criação de rota de autenticação para geração de token
// {...}
$app->post("/auth", "UsuarioController:autenticar");



// agrupamento para organizar o web service chamando os métodos do controller
$app->group("/unidades",
	function () {
		$this->get("", "UnidadeController:listar");
		$this->get("/{id:[0-9]+}", "UnidadeController:buscarPorId");
		$this->post("", "UnidadeController:inserir");
		$this->put("/{id:[0-9]+}", "UnidadeController:atualizar");
		$this->delete("/{id:[0-9]+}", "UnidadeController:deletar");
	})
	->add("UsuarioController:validarToken");
	

$app->group("/usuarios",
	function () {
		$this->get("", "UsuarioController:listar");
		$this->get("/{id:[0-9]+}", "UsuarioController:buscarPorId");
		$this->post("", "UsuarioController:inserir");
		$this->put("/{id:[0-9]+}", "UsuarioController:atualizar");
		$this->delete("/{id:[0-9]+}", "UsuarioController:deletar");
	})
	->add("UsuarioController:validarToken");

$app->group("/horarios",
	function () {
		$this->get("", "HorarioController:listar");
		$this->get("/{id:[0-9]+}", "HorarioController:buscarPorId");
		$this->post("", "HorarioController:inserir");
		$this->put("/{id:[0-9]+}", "HorarioController:atualizar");
		$this->delete("/{id:[0-9]+}", "HorarioController:deletar");
	})
	->add("UsuarioController:validarToken");
	

$app->group("/posicoes",
	function () {
		$this->get("", "PosicaoController:listar");
		$this->get("/{id:[0-9]+}", "PosicaoController:buscarPorId");
		$this->post("", "PosicaoController:inserir");
		$this->put("/{id:[0-9]+}", "PosicaoController:atualizar");
		$this->delete("/{id:[0-9]+}", "PosicaoController:deletar");
		$this->get("/listar2", "PosicaoController:listar2");

	})
	->add("UsuarioController:validarToken");


$app->run();
?>

