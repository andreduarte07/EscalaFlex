<?php
require_once "header.php";

class HorarioDAO {

	public function listar() {
        $pdo = PDOFactory::getConexao();
        $query = "SELECT u.idHorario AS idHorario, u.hrAberturaSemanal AS hrAberturaSemanal, u.hrFechamentoSemanal AS hrFechamentoSemanal, u.hrAberturaSabado AS hrAberturaSabado, u.hrFechamentoSabado AS hrFechamentoSabado, u.hrAberturaDomingo AS hrAberturaDomingo, u.hrFechamentoDomingo AS hrFechamentoDomingo, c.idUnidade AS fk_idUnidade, c.nome AS  nome
		FROM horarios AS u 
		JOIN unidades AS c 
		ON u.fk_idUnidade = c.idUnidade";
        $comando = $pdo->prepare($query);
       	$comando->execute();
        $horarios = array();
        while ($result = $comando->fetch(PDO::FETCH_OBJ)) {
          $horarios[] = new Horario($result->idHorario, $result->hrAberturaSemanal, $result->hrFechamentoSemanal, $result->hrAberturaSabado, $result->hrFechamentoSabado, $result->hrAberturaDomingo, $result->hrFechamentoDomingo, $result->fk_idUnidade, $result->nome);
        }
        return $horarios;
    }

	public function buscarPorId($idHorario) {
		$pdo     = PDOFactory::getConexao();
		$query   = "SELECT * FROM horarios WHERE idHorario = :idHorario";
		$comando = $pdo->prepare($query);
		$comando->bindParam("idHorario", $idHorario);
		$comando->execute();
		$result = $comando->fetch(PDO::FETCH_OBJ);
		return new Horario($result->idHorario, $result->hrAberturaSemanal, $result->hrFechamentoSemanal, $result->hrAberturaSabado, $result->hrFechamentoSabado, $result->hrAberturaDomingo, $result->hrFechamentoDomingo, $result->fk_idUnidade, "");
    }
      
	public function inserir(Horario $horario) {
		$query = "INSERT INTO horarios ( hrAberturaSemanal, hrFechamentoSemanal, hrAberturaSabado, hrFechamentoSabado, hrAberturaDomingo, hrFechamentoDomingo, fk_idUnidade) VALUES ( :hrAberturaSemanal, :hrFechamentoSemanal, :hrAberturaSabado, :hrFechamentoSabado, :hrAberturaDomingo, :hrFechamentoDomingo, :fk_idUnidade)";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":hrAberturaSemanal", $horario->hrAberturaSemanal);
		$comando->bindParam(":hrFechamentoSemanal", $horario->hrFechamentoSemanal);
		$comando->bindParam(":hrAberturaSabado", $horario->hrAberturaSabado);
		$comando->bindParam(":hrFechamentoSabado", $horario->hrFechamentoSabado);
		$comando->bindParam(":hrAberturaDomingo", $horario->hrAberturaDomingo);
		$comando->bindParam(":hrFechamentoDomingo", $horario->hrFechamentoDomingo);
		$comando->bindParam(":fk_idUnidade", $horario->fk_idUnidade);
		$comando->execute();
		$horario->id = $pdo->lastInsertId();
		return $horario;
      }
 
  
	  public function atualizar(Horario $horario) {
		$query = "UPDATE horarios SET hrAberturaSemanal=:hrAberturaSemanal , hrFechamentoSemanal=:hrFechamentoSemanal , hrAberturaSabado=:hrAberturaSabado , hrFechamentoSabado=:hrFechamentoSabado , hrAberturaDomingo=:hrAberturaDomingo , hrFechamentoDomingo=:hrFechamentoDomingo , fk_idUnidade=:fk_idUnidade WHERE idHorario=:idHorario";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":hrAberturaSemanal", $horario->hrAberturaSemanal);
		$comando->bindParam(":hrFechamentoSemanal", $horario->hrFechamentoSemanal);
		$comando->bindParam(":hrAberturaSabado", $horario->hrAberturaSabado);
		$comando->bindParam(":hrFechamentoSabado", $horario->hrFechamentoSabado);
		$comando->bindParam(":hrAberturaDomingo", $horario->hrAberturaDomingo);
		$comando->bindParam(":hrFechamentoDomingo", $horario->hrFechamentoDomingo);
		$comando->bindParam(":fk_idUnidade", $horario->fk_idUnidade);
		$comando->execute();
		return $horario;
	  }

      


	  public function deletar($idHorario) {
		$query = "DELETE FROM horarios WHERE idHorario=:idHorario";
		$pdo = PDOFactory::getConexao();
		$comando = $pdo->prepare($query);
		$comando->bindParam(":idHorario", $idHorario);
		$comando->execute();
		return $idHorario;
	  }





}
?>