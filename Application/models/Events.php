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
    $result = $conn->executeQuery('SELECT nome_evento, sigla_evento, periodo_evento, cod_evento, img_evento, descricao_evento, link_evento, link_inscricao_evento, data_modificacao, usuario FROM evento');
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
    $result = $conn->executeQuery('SELECT nome_evento, sigla_evento, periodo_evento, cod_evento, img_evento, descricao_evento, link_evento, link_inscricao_evento, data_modificacao, usuario
    FROM evento
    WHERE cod_evento = :ID', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function findByText(String $text)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT nome_evento, sigla_evento, periodo_evento, cod_evento, img_evento, descricao_evento, link_evento, link_inscricao_evento, data_modificacao, usuario FROM evento WHERE nome_evento LIKE :T', array(
      ':T' => '%'.$text.'%'
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }


  public static function find(int $eventsPerPage, int $offset)
  {
    $conn = new Database();

    $result = $conn->executeQueryLimitOffset('SELECT nome_evento, sigla_evento, periodo_evento, cod_evento, img_evento, descricao_evento, link_evento, link_inscricao_evento, data_modificacao, usuario FROM evento LIMIT :L OFFSET :O',
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
  public static function newEvent()
  {
      $conn = new Database();
      $result = $conn->executeQuery('SELECT count(cod_evento) as total FROM evento');
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function createEvent(array $dataEvent)
  {
    $conn = new Database();
    $insertEvent = $conn->executeQuery('INSERT INTO evento (nome_evento, sigla_evento, periodo_evento, descricao_evento, img_evento) VALUES (:nome, :sigla, :periodo, :descricao, :banner)', array(
      ':nome'       => $dataEvent['nome_evento'],
      ':sigla'      => $dataEvent['sigla_evento'],
      ':periodo'    => $dataEvent['periodo_evento'],
      ':descricao'  => $dataEvent['descricao_evento'],
      ':banner'     => $dataEvent['img_evento']
    ));

    return $insertEvent->fetchAll(PDO::FETCH_ASSOC);
  }
  

  // update


  //delete


  // exemplo: findByDate

}
