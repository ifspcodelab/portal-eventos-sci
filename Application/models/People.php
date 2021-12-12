<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class People
{
  public static function findAll()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT ps.cod_pessoa, ps.nome_contato, ps.email_pessoa, ps.telefone, ps.celular, pex.area_contato_empresa, emp.nome_empresa, emp.email, emp.site_empresa, eif.papel_envolvido_ifsp, apif.nome_departamento, resp.fk_atividade_cod_atividade 
    FROM pessoa ps 
    LEFT JOIN pessoa_externa pex 
    ON ps.cod_pessoa = pex.fk_pessoa_cod_pessoa 
    LEFT JOIN empresa emp 
    ON pex.fk_empresa_cod_empresa = emp.cod_empresa 
    LEFT JOIN pessoa_ifsp pif 
    ON ps.cod_pessoa = pif.fk_pessoa_cod_pessoa 
    LEFT JOIN envolvido_ifsp eif 
    ON pif.cod_pessoa_ifsp = eif.fk_pessoa_IFSP_cod_pessoa_ifsp 
    LEFT JOIN area_pessoa_ifsp apif 
    ON pif.fk_area_pessoa_IFSP_cod_area_pessoa_ifsp = apif.cod_area_pessoa_ifsp 
    LEFT JOIN responsavel_atividade resp 
    ON ps.cod_pessoa = resp.fk_pessoa_cod_pessoa');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Este método busca um evento armazenado na base de dados com um
  * determinado ID
  * @param    int     $id   Identificador único do usuário
  *
  * @return   array
  */
  public static function findById($id)
  {
    $conn = new Database();
    
    if($id != null){
      $result = $conn->executeQuery('SELECT ps.cod_pessoa, ps.nome_contato, ps.email_pessoa,  pex.area_contato_empresa, emp.nome_empresa, emp.email, eif.papel_envolvido_ifsp, apif.nome_departamento
      FROM pessoa ps
      LEFT JOIN pessoa_externa pex
      ON ps.cod_pessoa = pex.fk_pessoa_cod_pessoa
      LEFT JOIN empresa emp
      ON pex.fk_empresa_cod_empresa = emp.cod_empresa
      LEFT JOIN pessoa_ifsp pif
      ON ps.cod_pessoa = pif.fk_pessoa_cod_pessoa
      LEFT JOIN envolvido_ifsp eif
      ON pif.cod_pessoa_ifsp = eif.fk_pessoa_IFSP_cod_pessoa_ifsp
      LEFT JOIN area_pessoa_ifsp apif
      ON pif.fk_area_pessoa_IFSP_cod_area_pessoa_ifsp = apif.cod_area_pessoa_ifsp
      LEFT JOIN responsavel_atividade resp
      ON ps.cod_pessoa = resp.fk_pessoa_cod_pessoa
      WHERE resp.fk_atividade_cod_atividade = :ID', array(
        ':ID' => $id
      ));
      
      return $result->fetchAll(PDO::FETCH_ASSOC);
    }
  }  

  // create
  public static function createPerson(array $dataPerson)
  {
    $conn = new Database();
    $insertPerson = $conn->executeQuery('INSERT INTO pessoa (nome_contato, email_pessoa, celular, telefone) VALUES (:nome, :email, :celular, :telefone)', array(
      ':nome'       => $dataPerson['nome_contato'],
      ':email'      => $dataPerson['email'],
      ':celular'    => $dataPerson['celular'],
      ':telefone'   => $dataPerson['telefone']
    ));

    return $insertPerson->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getLastPerson(){
    $conn = new Database();
    $personId = $conn->executeQuery('SELECT cod_pessoa FROM `pessoa` ORDER BY cod_pessoa DESC LIMIT 1');

    return $personId->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getLastInternalPerson(){
    $conn = new Database();
    $personId = $conn->executeQuery('SELECT cod_pessoa_ifsp FROM `pessoa_ifsp` ORDER BY cod_pessoa_ifsp DESC LIMIT 1');

    return $personId->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function responsibleActivity(array $involvedId, array $activityId)
  {
    $conn = new Database();

    $fk_pessoa_cod_pessoa = 0;
    $fk_atividade_cod_atividade = 0;

    foreach($involvedId as $person):
      $fk_pessoa_cod_pessoa = $person;
    break;
    endforeach;

    foreach($activityId as $activity):
      $fk_atividade_cod_atividade = $activity;
    break;
    endforeach;

    $responsibleActivity = $conn->executeQuery('INSERT INTO responsavel_atividade (fk_pessoa_cod_pessoa, fk_atividade_cod_atividade) VALUES (:fk_cod_pessoa, :fk_cod_atividade)', array(
      ':fk_cod_pessoa'    => $fk_pessoa_cod_pessoa['cod_pessoa'],
      ':fk_cod_atividade' => $fk_atividade_cod_atividade['cod_atividade']
    ));

    return $responsibleActivity->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function createExternalPerson(array $personId, $area_empresa, $codCompany)
  {
    $conn = new Database();

    if($codCompany == null){
      $fk_empresa = $codCompany;
    }
    else{
      foreach($codCompany as $company):
        $fk_empresa = $company['cod_empresa'];
      break;
      endforeach;
    }

    foreach($personId as $fk_cod_pessoa):
      $insertExternalPerson = $conn->executeQuery('INSERT INTO pessoa_externa (area_contato_empresa, fk_pessoa_cod_pessoa, fk_empresa_cod_empresa) VALUES (:area_contato, :fk_cod_pessoa, :fk_empresa)', array(
        ':area_contato'   => $area_empresa,
        ':fk_cod_pessoa'  => $fk_cod_pessoa['cod_pessoa'],
        ':fk_empresa'     => $fk_empresa
      ));
    break;
    endforeach;

    return $insertExternalPerson->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function createInternalPerson(array $personId, array $dataInternalPerson)
  {
    $conn = new Database();
    
    $fk_area_pessoa = null;

    $result = $conn->executeQuery('SELECT nome_area, cod_area_pessoa_ifsp FROM area_pessoa_ifsp');
    
    foreach($result as $area){
      if($area['nome_area'] == $dataInternalPerson['area_ifsp']){
        $fk_area_pessoa = $area['cod_area_pessoa_ifsp'];
      }
    }

    foreach($personId as $fk_cod_pessoa):
      $insertInternalPerson = $conn->executeQuery('INSERT INTO pessoa_ifsp (tipo_pessoa, fk_pessoa_cod_pessoa, fk_area_pessoa_IFSP_cod_area_pessoa_ifsp) VALUES (:tipo_pessoa, :fk_cod_pessoa, :fk_area_pessoa)', array(
        ':tipo_pessoa'    => $dataInternalPerson['tipo_pessoa'],
        ':fk_cod_pessoa'  => $fk_cod_pessoa['cod_pessoa'],
        ':fk_area_pessoa' => $fk_area_pessoa
      ));
    break;
    endforeach;

    return $insertInternalPerson->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function involvedInternal(array $involvedId, array $activityId, $papel_envolvido)
  {
    $conn = new Database();

    $fk_pessoa_cod_pessoa_ifsp = 0;
    $fk_atividade_cod_atividade = 0;

    foreach($involvedId as $person):
      $fk_pessoa_cod_pessoa_ifsp = $person;
    break;
    endforeach;

    foreach($activityId as $activity):
      $fk_atividade_cod_atividade = $activity;
    break;
    endforeach;

    $responsibleActivity = $conn->executeQuery('INSERT INTO envolvido_ifsp (fk_pessoa_IFSP_cod_pessoa_ifsp, fk_atividade_cod_atividade, papel_envolvido_ifsp) VALUES (:fk_cod_pessoa, :fk_cod_atividade, :papel_envolvido)', array(
      ':fk_cod_pessoa'    => $fk_pessoa_cod_pessoa_ifsp['cod_pessoa_ifsp'],
      ':fk_cod_atividade' => $fk_atividade_cod_atividade['cod_atividade'],
      ':papel_envolvido'  => $papel_envolvido
    ));

    return $responsibleActivity->fetchAll(PDO::FETCH_ASSOC);
  }


  // update
  public static function updatePerson(int $personId, array $dataPerson)
  {
    $conn = new Database();
    $updatePerson = $conn->executeQuery('UPDATE pessoa SET nome_contato = :nome, email_pessoa = :email, celular = :celular, telefone = :telefone WHERE cod_pessoa = :id', array(
      ':id'         => $personId,
      ':nome'       => $dataPerson['nome_contato'],
      ':email'      => $dataPerson['email'],
      ':celular'    => $dataPerson['celular'],
      ':telefone'   => $dataPerson['telefone']
    ));
    
    return $updatePerson->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function updateExternalPerson(int $personId, array $dataCompany)
  {
    $conn = new Database();

    $getCompany = $conn->executeQuery('SELECT fk_empresa_cod_empresa FROM pessoa_externa WHERE fk_pessoa_cod_pessoa = :id', array(
      ':id'   => $personId
    ));

    foreach($getCompany as $company):
      $codCompany = $company['fk_empresa_cod_empresa'];

      $updateExternalPerson = $conn->executeQuery('UPDATE pessoa_externa SET area_contato_empresa = :area_contato WHERE fk_pessoa_cod_pessoa = :id', array(
        ':id'           => $personId,
        ':area_contato' => $dataCompany['area_empresa']
      ));

      if(!($codCompany == null)){
        $updateCompany = $conn->executeQuery('UPDATE empresa SET nome_empresa = :nome, email = :email, site_empresa = :site_empresa WHERE cod_empresa = :empresa', array(
          ':empresa'      => $codCompany,
          ':nome'         => $dataCompany['nome_empresa'],
          ':email'        => $dataCompany['email'],
          ':site_empresa' => $dataCompany['site_empresa']
        ));
      }
    break;
    endforeach;

    return $updateExternalPerson->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function updateInternalPerson(int $personId, array $dataInternalPerson)
  {
    $conn = new Database();
    
    $fk_area_pessoa = null;

    $result = $conn->executeQuery('SELECT nome_departamento, cod_area_pessoa_ifsp FROM area_pessoa_ifsp');
    $pessoa = $conn->executeQuery('SELECT cod_pessoa_ifsp FROM pessoa_ifsp WHERE fk_pessoa_cod_pessoa = :id', array(
      ':id' => $personId
    ));
    
    foreach($pessoa as $id_pessoa):
      $cod_pessoa = $id_pessoa['cod_pessoa_ifsp'];
    break;
    endforeach;

    foreach($result as $area){
      if($area['nome_departamento'] == $dataInternalPerson['area_ifsp']){
        $fk_area_pessoa = $area['cod_area_pessoa_ifsp'];
      }
    }
    
    $updateInternalPerson = $conn->executeQuery('UPDATE pessoa_ifsp  SET tipo_pessoa = :tipo_pessoa, fk_area_pessoa_IFSP_cod_area_pessoa_ifsp = :fk_area_pessoa WHERE fk_pessoa_cod_pessoa = :fk_cod_pessoa', array(
      ':tipo_pessoa'    => $dataInternalPerson['tipo_pessoa'],
      ':fk_cod_pessoa'  => $personId,
      ':fk_area_pessoa' => $fk_area_pessoa
    ));

    $responsibleActivity = $conn->executeQuery('UPDATE envolvido_ifsp SET papel_envolvido_ifsp = :papel_envolvido WHERE fk_pessoa_IFSP_cod_pessoa_ifsp = :fk_cod_pessoa', array(
      ':fk_cod_pessoa'    => $cod_pessoa,
      ':papel_envolvido'  => $dataInternalPerson['tipo_pessoa']
    ));

    return $updateInternalPerson->fetchAll(PDO::FETCH_ASSOC);
  }


  //delete
  public static function deleteInvolvedById(int $involved)
  {
    $conn = new Database();
    
    $deleteInvolved = $conn->executeQuery('DELETE FROM `pessoa` WHERE `pessoa`.`cod_pessoa` = :id', array(
      ':id' => $involved
    ));

    return $deleteInvolved->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function deleteInvolvedByActivityArray(int $activity)
  {
    $conn = new Database();
    
    foreach ($activity as $id){
      $deleteInvolved = $conn->executeQuery('DELETE FROM `pessoa` 
        INNER JOIN `responsavel_atividade resp`
        ON `resp.fk_pessoa_cod_pessoa = pessoa.cod_pessoa`
        WHERE `resp.fk_atividade_cod_atividade` = :id', array(
        ':id' => $id
      ));
    }

    return $deleteInvolved->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function deleteInvolvedByActivityId(int $activity)
  {
    $conn = new Database();
    
    $deleteInvolved = $conn->executeQuery('DELETE pessoa FROM pessoa INNER JOIN responsavel_atividade ON responsavel_atividade.fk_pessoa_cod_pessoa = pessoa.cod_pessoa WHERE responsavel_atividade.fk_atividade_cod_atividade = :id', array(
      ':id' => $activity
    ));

    return $deleteInvolved->fetchAll(PDO::FETCH_ASSOC);
  }


  // exemplo: findByDate

}
