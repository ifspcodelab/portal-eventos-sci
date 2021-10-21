<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Events
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
    $result = $conn->executeQuery('SELECT cod_evento, nome_evento, sigla_evento, periodo_evento, img_evento, descricao_evento FROM evento');
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
    $result = $conn->executeQuery('SELECT ev.cod_evento, ev.nome_evento, ev.sigla_evento, ev.descricao_evento, ev.img_evento, ev.periodo_evento, atv.cod_atividade, atv.nome_atividade, atv.preco_inscricao, atv.data_inicio, atv.data_fim, atv.descricao_atividade, atv.observacao_atividade, atv.hora_inicio, atv.hora_fim, atv.link_atividade, atv.link_inscricao_atividade
    FROM evento ev 
    INNER JOIN atividade atv 
    ON ev.cod_evento = atv.fk_evento_cod_evento 
    WHERE ev.cod_evento = :ID', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function findByText(String $text)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT cod_evento, nome_evento, sigla_evento, periodo_evento, img_evento, descricao_evento FROM evento WHERE nome_evento LIKE :T', array(
      ':T' => '%'.$text.'%'
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }


  public static function find(int $eventsPerPage, int $offset)
  {
    $conn = new Database();

    $result = $conn->executeQueryLimitOffset('SELECT cod_evento, nome_evento, sigla_evento, periodo_evento, img_evento, descricao_evento FROM evento LIMIT :L OFFSET :O',
      $eventsPerPage,
      $offset
    );
    
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function countEvents()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT count(cod_evento) as total FROM evento');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  // create


  // update


  //delete


  // exemplo: findByDate

}
