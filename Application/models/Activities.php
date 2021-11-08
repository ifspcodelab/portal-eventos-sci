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
      foreach($dataActivities as $activity){
        $insertActivities = $conn->executeQuery('INSERT INTO atividade (nome_atividade, data_inicio, data_fim, hora_inicio, hora_fim, descricao_atividade, observacao_atividade, preco_inscricao, pontuacao_atividade, link_atividade, link_inscricao_atividade, fk_evento_cod_evento) VALUES (:nome, :dataInicio, :dataFim, :horaInicio, :horaFim, :descricao, :obsevacao, :preco, :pontuacao, :linkAtividade, :linkInscricao, :evento)', array(
          ':nome'           => $activity['nome_atividade'],
          ':dataInicio'     => date("Y-m-d", strtotime(str_replace('/', '-', $activity['data_inicio']))),
          ':dataFim'        => date("Y-m-d", strtotime(str_replace('/', '-', $activity['data_fim']))),
          ':horaInicio'     => date("H:i", strtotime($activity['data_inicio'])),
          ':horaFim'        => date("H:i", strtotime($activity['data_fim'])),
          ':descricao'      => $activity['descricao_atividade'],
          ':obsevacao'      => $activity['observacao_atividade'],
          ':preco'          => (float) $activity['preco_inscricao'],
          ':pontuacao'      => (float) $activity['pontuacao_atividade'],
          ':linkAtividade'  => $activity['link_atividade'],
          ':linkInscricao'  => $activity['link_inscricao_atividade'],
          ':evento'         => (int) $event['cod_evento']
        ));
        var_dump($insertActivities);
        return $insertActivities->fetchAll(PDO::FETCH_ASSOC);
      }
    break;
    endforeach;

    
  }


  // update


  //delete


  // exemplo: findByDate

}
