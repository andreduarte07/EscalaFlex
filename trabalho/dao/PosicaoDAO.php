<?php

class PosicaoDAO {


	public function listar() {
        $pdo = PDOFactory::getConexao();
        $query = "SELECT p.idPosicao AS idPosicao, p.descricao AS descricao, u.idUnidade AS fk_idUnidade, u.nome AS nome 
		FROM posicoes AS p 
		JOIN unidades AS u 
		ON u.idUnidade = p.fk_idUnidade";
        $comando = $pdo->prepare($query);
       	$comando->execute();
        $posicoes = array();
        while ($result = $comando->fetch(PDO::FETCH_OBJ)) {
          $posicoes[] = new Posicao($result->idPosicao, $result->descricao, $result->fk_idUnidade, $result->nome);
        }
        return $posicoes;
    }

	public function buscarPorId($idPosicao) {
		$pdo     = PDOFactory::getConexao();
		$query   = "SELECT * FROM posicoes WHERE idPosicao = :idPosicao";
		$comando = $pdo->prepare($query);
		$comando->bindParam("idPosicao", $idPosicao);
		$comando->execute();
		$result = $comando->fetch(PDO::FETCH_OBJ);
		return new Posicao($result->idPosicao, $result->descricao, $result->fk_idUnidade, "");
    }
    

    
	public function inserir(Posicao $posicao) {
		$query = "INSERT INTO posicoes (descricao, fk_idUnidade) VALUES (:descricao, :fk_idUnidade)";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":descricao", $posicao->descricao);
		$comando->bindParam(":fk_idUnidade", $posicao->fk_idUnidade);
		$comando->execute();
		$posicao->id = $pdo->lastInsertId();
		return $posicao;
      }
 
  
	  public function atualizar(Posicao $posicao) {
		$query = "UPDATE posicoes SET descricao=:descricao , fk_idUnidade=:fk_idUnidade WHERE idPosicao=:idPosicao";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":idPosicao", $posicao->id);
		$comando->bindParam(":descricao", $posicao->descricao);
		$comando->bindParam(":fk_idUnidade", $posicao->fk_idUnidade);
		$comando->execute();
		return $posicao;
	  }

      


	  public function deletar($idPosicao) {
		$query = "DELETE FROM posicoes WHERE idPosicao=:idPosicao";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":idPosicao", $idPosicao);
		$comando->execute();
		return $idPosicao;
	  }





}
?>