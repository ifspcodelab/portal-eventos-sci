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


  public static function findByActivityId(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT link_atividade, hora_fim, preco_inscricao, data_inicio, cod_atividade, data_fim, observacao_atividade, nome_atividade, descricao_atividade, pontuacao_atividade, hora_inicio, link_inscricao_atividade, data_modificacao, usuario, fk_evento_cod_evento
    FROM atividade
    WHERE fk_evento_cod_evento = :ID', array(
      ':ID' => $id
    ));
    
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function createActivity(array $dataActivities)
  {
    $conn = new Database();
    
    $eventId = $conn->executeQuery('SELECT cod_evento FROM `evento` ORDER BY cod_evento DESC LIMIT 1');

    foreach($eventId as $event):
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
    break;
    endforeach;
    
    return $insertActivities->fetchAll(PDO::FETCH_ASSOC);
  }

  

  // update


  //delete


  // exemplo: findByDate

}
