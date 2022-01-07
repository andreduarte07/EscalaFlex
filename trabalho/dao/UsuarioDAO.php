<?php
require_once "header.php";

class UsuarioDAO {

	public function listar() {
        $pdo = PDOFactory::getConexao();
        $query = "SELECT * FROM usuarios";
        $comando = $pdo->prepare($query);
       	$comando->execute();
        $usuarios = array();
        while ($result = $comando->fetch(PDO::FETCH_OBJ)) {
          $usuarios[] = new Usuario($result->idUsuario, $result->nome, $result->email, $result->senha, $result->status, $result->matricula);
        }
        return $usuarios;
    }

	public function buscarPorId($idUsuario) {
		$query   = 'SELECT * FROM usuarios WHERE idUsuario=:idUsuario';
		$pdo     = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam('idUsuario', $idUsuario);
		$comando->execute();
		$result = $comando->fetch(PDO::FETCH_OBJ);
		return new Usuario($result->idUsuario, $result->nome, $result->email, $result->senha, $result->status, $result->matricula);
	}

	public function buscarPorLogin($email) {
		$query   = "SELECT * FROM usuarios WHERE email = :email";
		$pdo     = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam('email', $email);
		$comando->execute();
		$result = $comando->fetch(PDO::FETCH_OBJ);
		
		if(empty($result))
			return false;
		else
        return new Usuario($result->idUsuario, $result->nome, $result->email, $result->senha, $result->status, $result->matricula);
	}

	public function inserir(Usuario $usuario) {
		$query = "INSERT INTO usuarios (nome, email, senha, status, matricula) VALUES (:nome, :email, :senha, :status, :matricula)";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":nome", $usuario->nome);
		$comando->bindParam(":email", $usuario->email);
		$comando->bindParam(":senha", $usuario->senha);
		$comando->bindParam(":status", $usuario->status);
		$comando->bindParam(":matricula", $usuario->matricula);
		$comando->execute();
		$usuario->id = $pdo->lastInsertId();
		return $usuario;
	  }

	  public function deletar($idUsuario) {
		$query = "DELETE FROM usuarios WHERE idUsuario=:idUsuario";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":idUsuario", $idUsuario);
		$comando->execute();
		return $idUsuario;
	  }
  
	  public function atualizar(Usuario $usuario) {
		$query = "UPDATE usuarios SET nome=:nome , email=:email , senha=:senha , status=:status , matricula=:matricula  WHERE idUsuario=:idUsuario";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":idUsuario", $usuario->id);
		$comando->bindParam(":nome", $usuario->nome);
		$comando->bindParam(":email", $usuario->email);
		$comando->bindParam(":senha", $usuario->senha);
		$comando->bindParam(":status", $usuario->status);
		$comando->bindParam(":matricula", $usuario->matricula);
		$comando->execute();
		return $usuario;
	  }
    
}
?>