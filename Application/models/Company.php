<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Company
{
  // create
  public static function createCompany(array $dataCompany)
  {
    $conn = new Database();
    $insertCompany = $conn->executeQuery('INSERT INTO empresa (nome_empresa, email, site_empresa) VALUES (:nome, :email, :site_empresa)', array(
      ':nome'             => $dataCompany['nome_empresa'],
      ':email'            => $dataCompany['email'],
      ':site_empresa'     => $dataCompany['site_empresa']
    ));

    return $insertCompany->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getLastCompany(){
    $conn = new Database();
    $companyId = $conn->executeQuery('SELECT cod_empresa FROM `empresa` ORDER BY cod_empresa DESC LIMIT 1');

    return $companyId->fetchAll(PDO::FETCH_ASSOC);
  }

  // update


  //delete


  // exemplo: findByDate

}
