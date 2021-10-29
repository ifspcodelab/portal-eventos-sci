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

  public static function createEvent(array $dataEvent, array $dataActivities)
  {
    $conn = new Database();
    $insertActivities = $conn->executeQuery('INSERT INTO atividade (nome_atividade, data_inicio, data_fim, hora_inicio, hora_fim, descricao_atividade, observacao_atividade, preco_inscricao, pontuacao_atividade, link_atividade, link_inscricao_atividade, fk_evento_cod_evento) VALUES (:nome, :dataInicio, :dataFim, :horaInicio, :horaFim, :descricao, :obsevacao, :preco, :pontuacao, :linkAtividade, :linkInscricao, :evento)', array(
      ':nome'           => $dataActivities['nome_atividade'],
      ':dataInicio'     => date("Y-m-d", strtotime(str_replace('/', '-', $dataActivities['data_inicio']))),
      ':dataFim'        => date("Y-m-d", strtotime(str_replace('/', '-', $dataActivities['data_fim']))),
      ':horaInicio'     => date("H:i", strtotime($dataActivities['data_inicio'])),
      ':horaFim'        => date("H:i", strtotime($dataActivities['data_fim'])),
      ':descricao'      => $dataActivities['descricao_atividade'],
      ':obsevacao'      => $dataActivities['observacao_atividade'],
      ':preco'          => (float) $dataActivities['preco_inscricao'],
      ':pontuacao'      => (float) $dataActivities['pontuacao_atividade'],
      ':linkAtividade'  => $dataActivities['link_atividade'],
      ':linkInscricao'  => $dataActivities['link_inscricao_atividade'],
      ':evento'         => (int) $event['cod_evento']
    ));
    
    return $insertActivities->fetchAll(PDO::FETCH_ASSOC);
  }
  

  // update


  //delete


  // exemplo: findByDate

}
