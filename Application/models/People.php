<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class People
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
  public static function findById($id)
  {
    $conn = new Database();
    
    if($id != null){
      $result = $conn->executeQuery('SELECT ps.nome_contato,  pex.area_contato_empresa, emp.nome_empresa, eif.papel_envolvido_ifsp, apif.nome_departamento
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

  // update


  //delete


  // exemplo: findByDate

}
