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
    $result = $conn->executeQuery('SELECT cod_evento, nome_evento, sigla_evento, periodo_evento, img_evento, descricao_evento WHERE cod_evento = :ID', array(
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


  // create


  // update


  //delete


  // exemplo: findByDate

}
