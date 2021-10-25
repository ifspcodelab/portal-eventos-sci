<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Activities
{
  /** Poderiamos ter atributos aqui */
  /**
  * Este método busca todos os eventos armazenados na base de dados
  *
  * @return   array
  */
  public static function findAll()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT ***** FROM atividade');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Este método busca um evento armazenado na base de dados com um
  * determinado ID
  * @param    int     $id   Identificador único do usuário
  *
  * @return   array
  */
  public static function findById(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT  ******
    FROM atividade at
    WHERE at.cod_atividade = :ID', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }


  public static function findByEventId(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT link_atividade, hora_fim, preco_inscricao, data_inicio, cod_atividade, data_fim, observacao_atividade, nome_atividade, descricao_atividade, pontuacao_atividade, hora_inicio, link_inscricao_atividade, data_modificacao, usuario, fk_evento_cod_evento
    FROM atividade
    WHERE fk_evento_cod_evento = :ID', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  

  // update


  //delete


  // exemplo: findByDate

}
