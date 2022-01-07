<?php

class UnidadeDAO {

	public function listar() {
        $pdo = PDOFactory::getConexao();
		$query = "SELECT u.idUnidade AS idUnidade, u.nome AS nome, u.endereco AS endereco, u.telefone AS telefone, u.cep AS cep, u.email AS email, u.responsavel AS responsavel, u.cidade AS cidade, u.estado AS estado, c.id AS fk_Categoria, c.descricao AS categoria_descricao 
				  FROM unidades AS u 
				  JOIN categoria AS c 
				  ON u.fk_Categoria = c.id";
        $comando = $pdo->prepare($query);
       	$comando->execute();
        $unidades = array();
        while ($result = $comando->fetch(PDO::FETCH_OBJ)) {
          $unidades[] = new Unidade($result->idUnidade, $result->nome, $result->endereco, $result->telefone, $result->cep, $result->email, $result->responsavel, $result->cidade, $result->estado, $result->fk_Categoria, $result->categoria_descricao);
        }
        return $unidades;
    }
	


	public function buscarPorId($idUnidade) {
		$pdo     = PDOFactory::getConexao();
		$query   = "SELECT * FROM unidades WHERE idUnidade = :idUnidade";
		$comando = $pdo->prepare($query);
		$comando->bindParam("idUnidade", $idUnidade);
		$comando->execute();
		$result = $comando->fetch(PDO::FETCH_OBJ);
		return new Unidade($result->idUnidade, $result->nome, $result->endereco, $result->telefone, $result->cep, $result->email, $result->responsavel, $result->cidade, $result->estado, $result->fk_Categoria, "");
	}


	
	public function inserir(Unidade $unidade) {
		$query = "INSERT INTO unidades (nome, endereco, telefone, cep, email, responsavel, cidade, estado, fk_Categoria) VALUES (:nome, :endereco, :telefone, :cep, :email, :responsavel, :cidade, :estado, :fk_Categoria)";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":nome", $unidade->nome);
		$comando->bindParam(":endereco", $unidade->endereco);
		$comando->bindParam(":telefone", $unidade->telefone);
		$comando->bindParam(":cep", $unidade->cep);
		$comando->bindParam(":email", $unidade->email);
		$comando->bindParam(":responsavel", $unidade->responsavel);
		$comando->bindParam(":cidade", $unidade->cidade);
		$comando->bindParam(":estado", $unidade->estado);
		$comando->bindParam(":fk_Categoria", $unidade->fk_Categoria);

		$comando->execute();
		$unidade->id = $pdo->lastInsertId();
		return $unidade;
	  }
  
	  public function atualizar(Unidade $unidade) {
		$query = "UPDATE unidades SET nome=:nome , endereco=:endereco , telefone=:telefone , cep=:cep , email=:email , responsavel=:responsavel , cidade=:cidade , estado=:estado , fk_Categoria=:fk_Categoria WHERE idUnidade=:idUnidade";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":idUnidade", $unidade->id);
		$comando->bindParam(":nome", $unidade->nome);
		$comando->bindParam(":endereco", $unidade->endereco);
		$comando->bindParam(":telefone", $unidade->telefone);
		$comando->bindParam(":cep", $unidade->cep);
		$comando->bindParam(":email", $unidade->email);
		$comando->bindParam(":responsavel", $unidade->responsavel);
		$comando->bindParam(":cidade", $unidade->cidade);
		$comando->bindParam(":estado", $unidade->estado);
		$comando->bindParam(":fk_Categoria", $unidade->fk_Categoria);

		$comando->execute();
		return $unidade;
	  }
  
	  public function deletar($idUnidade) {
		$query = "DELETE FROM unidades WHERE idUnidade=:idUnidade";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":idUnidade", $idUnidade);
		$comando->execute();
		return $idUnidade;
	  }





}
?>