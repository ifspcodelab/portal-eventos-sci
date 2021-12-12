<?php

use Application\core\Controller;

class Event extends Controller
{
  /**
  * chama a view index.php da seguinte forma /user/index   ou somente   /user
  * e retorna para a view todos os usuários no banco de dados.
  */
  public function index($page = 1)
  {
    $Events = $this->model('Events'); // é retornado o model Events()
    
    $qtdEvents = 0; 
    $eventsPerPage = 2;
    $offset = ($page > 1) ? ($eventsPerPage * ($page - 1)) : 0;

    $count_data = $Events::countEvents();

    foreach ($count_data as $count){
      $qtdEvents = (int) $count['total'];
    }

    $maxPages = ceil($qtdEvents / $eventsPerPage);

    $data = $Events::find((int)$eventsPerPage, (int)$offset);

    $this->view('event/index', ['events' => $data, 'banner' => true, 'banner_template' => 'commons/banner', 'current_page' => $page, 'max_pages' => $maxPages]);
  }

  /**
  * chama a view show.php da seguinte forma /user/show passando um parâmetro 
  * via URL /user/show/id e é retornado um array contendo (ou não) um determinado
  * usuário. Além disso é verificado se foi passado ou não um id pela url, caso
  * não seja informado, é chamado a view de página não encontrada.
  * @param  int   $id   Identificado do usuário.
  */
  public function show($id = null, $idActivity = null)
  {
    if (is_numeric($id))
    {
      $Events = $this->model('Events');
      $dataEvents = $Events::findById($id);

      $Activities = $this->model('Activities');
      $dataActivities = $Activities::findByActivityId($id);
      
      $Involved = $this->model('People');
      $dataInvolved = $Involved::findById($idActivity);

      $this->view('event/show', ['events' => $dataEvents, 'activities' => $dataActivities, 'involved' => $dataInvolved]);
    }
    else
    {
      $this->pageNotFound();
    }
  }

  public function searchByText()
  {
    if (isset($_POST["inputSearch"]))
    {
      $searchText = $_POST["inputSearch"];
      $Events = $this->model('Events');
      $data = $Events::findByText($searchText);
      $this->view('event/index', ['events' => $data, 'banner' => true, 'banner_template' => 'commons/banner']);
    }
    else
    {
      $this->pageNotFound();
    }
  }

  public function create()
  {
    $Events = $this->model('Events');
    $data = $Events::newEvent();
    $this->view('event/create', ['events' => $data]);
  }

  public function createEvent($contActivities = 1)
  {
    if (isset($_POST['inputEvent']))
    {
      $dataEvent = array(
        'nome_evento'           => $_POST['inputEvent'],
        'sigla_evento'          => $_POST['inputEventSigla'],
        'descricao_evento'      => $_POST['inputDescription'],
        'periodo_evento'        => $_POST['selectPeriodoMes'].'/'.$_POST['inputPeriodoAno'],
        'img_evento'            => $_POST['fileDragData'],
        'link_evento'           => $_POST['inputLinkEvent'],
        'link_incricao_evento'  => $_POST['inputLinkSubscriptionEvent']
      );

      $Events = $this->model('Events');
      $dataEvents = $Events::createEvent((array)$dataEvent);

      // $arrayInvolved = array();

      $Activities = $this->model('Activities');
      $Involved   = $this->model('People');
      $Company    = $this->model('Company');

      for ($i = 1; $i <= $contActivities; $i++) { 
        $dataActivity = array(
          'nome_atividade'            => $_POST['inputActivity'.$i],
          'data_inicio'               => $_POST['dataInicio'.$i],
          'data_fim'                  => $_POST['dataFim'.$i],
          'descricao_atividade'       => $_POST['descriptionActivity'.$i],
          'observacao_atividade'      => $_POST['observationActivity'.$i],
          'preco_inscricao'           => $_POST['inputAmount'.$i],
          'pontuacao_atividade'       => $_POST['PointsDataList'.$i],
          'area_atividade'            => $_POST['AreaDataList'.$i],
          'link_atividade'            => $_POST['inputLinkActivity'.$i],
          'link_inscricao_atividade'  => $_POST['inputLinkSubscription'.$i],
          'qtdInvolved'               => $_POST['qtdInvolved-'.$i]
        );

        $dataActivities = $Activities::createActivity((array)$dataActivity);

        $codActivity = $Activities::getLastActivity();

        $qtdInvolved = (int)$dataActivity['qtdInvolved'];

        for ($j = 1; $j <= $qtdInvolved; $j++) { 
          $dataPerson = array(
            'nome_contato'  => $_POST['inputName-'.$i.'-'.$j],
            'email'         => $_POST['inputEmail-'.$i.'-'.$j],
            'celular'       => $_POST['inputCel-'.$i.'-'.$j],
            'telefone'      => $_POST['inputTel-'.$i.'-'.$j],
            'relacao_ifsp'  => $_POST['flexRadioDefault-'.$i.'-'.$j]
          );

          $dataInvolved = $Involved::createPerson((array)$dataPerson);

          $codPerson = $Involved::getLastPerson();

          $responsibleActivity = $Involved::responsibleActivity((array)$codPerson, (array)$codActivity);
    
          if($dataPerson['relacao_ifsp'] == "external"){
            if(isset($_POST['BusinessDataList-'.$i.'-'.$j]) && trim($_POST['BusinessDataList-'.$i.'-'.$j]) != ""){
              $dataCompany = array(
                'nome_empresa'  => $_POST['BusinessDataList-'.$i.'-'.$j],
                'email'         => $_POST['inputEmailCompany-'.$i.'-'.$j],
                'site_empresa'  => $_POST['inputLinkBusiness-'.$i.'-'.$j],
                'area_empresa'  => $_POST['inputAreaEmpresa-'.$i.'-'.$j]
              );

              $dataBusiness = $Company::createCompany((array)$dataCompany);

              $codCompany = $Company::getLastCompany();
            }
            else {
              $dataCompany = null;
              $codCompany = null;
            }

            $externalPerson = $Involved::createExternalPerson((array)$codPerson, $dataCompany['area_empresa'], $codCompany);
          }
          else if($dataPerson['relacao_ifsp'] == "internal"){
            $dataInternalPerson = array(
              'tipo_pessoa'  => $_POST['inputCategory-'.$i.'-'.$j],
              'area_ifsp'         => $_POST['AreaIfspDataList-'.$i.'-'.$j]
            );

            $internalPerson = $Involved::createInternalPerson((array)$codPerson, (array)$dataInternalPerson);
            
            $codInternalPerson = $Involved::getLastInternalPerson();

            $involvedInternal = $Involved::involvedInternal((array)$codInternalPerson, (array)$codActivity, $dataInternalPerson['tipo_pessoa']);
          }
        }
      }

      header('Location: /index.php');

      $this->view('/event/index', ['events' => $dataEvents, 'banner' => true, 'banner_template' => 'commons/banner']);
    }
    else
    {
      $this->pageNotFound();
    }
  }  

  public function edit($id = null, $Events = null, $Activities = null, $Involved = null)
  {
    if (is_numeric($id))
    {      
      if(!isset($Events)){
        $Events = $this->model('Events');
        $dataEvents = $Events::findById($id);
      }
      else{
        $dataEvents = $Events::findById($id);
      }

      if(!isset($Activities)){
        $Activities = $this->model('Activities');
        $dataActivities = $Activities::findByActivityId($id);
      }
      else{
        $dataActivities = $Activities::findByActivityId($id);
      }

      if(!isset($Involved)){
        $Involved = $this->model('People');
        $dataInvolved = $Involved::findAll();
      }
      else{
        $dataInvolved = $Involved::findAll();
      }
      
      $this->view('event/edit', ['events' => $dataEvents, 'activities' => $dataActivities, 'involved' => $dataInvolved]);
    }
    else
    {
      $this->pageNotFound();
    }
  }

  public function alterEvent($id = null, $contActivities = 1)
  {
    $Events = $this->model('Events');
    $Activities = $this->model('Activities');
    $Involved = $this->model('People');

    if(isset($_POST['delete'])){
      if($_POST['delete']){
        if (is_numeric($id))
        {
          $dataActivities = $Activities::findByActivityId($id);
          
          if(count($dataActivities) > 0){
            $Activities::deleteActivity($dataActivities);

            foreach($dataActivities as $atv){
              $countInvolved = $Involved::findById($atv);

              if(count($countInvolved) > 0){
                $Involved::deleteInvolvedByActivityArray($dataActivities);
              }
            }
          }
          else{
            echo 'nao setado';
          }
          
          $dataEvents = $Events::findById($id);
          $Events::deleteEvent($dataEvents);
          
          header('Location: /');
        }
        else
        {
          $this->pageNotFound();
        }
      }
    }
    
    $dataInvolved = $Involved::findAll();
    
    foreach ($dataInvolved as $involvedId){
      if(isset($_POST['deleteInvolved-'.$involvedId['cod_pessoa']])){
        if($_POST['deleteInvolved-'.$involvedId['cod_pessoa']]){
          
          $involved = $_POST['deleteInvolved-'.$involvedId['cod_pessoa']];
          
          $Involved::deleteInvolvedById($involved);
          
          $this->edit($id, $Events, $Activities, $Involved);
        }
      }
    }
    
    $dataActivities = $Activities::findByActivityId($id);

    foreach ($dataActivities as $activityId){
      if(isset($_POST['deleteActivity-'.$activityId['cod_atividade']])){
        if($_POST['deleteActivity-'.$activityId['cod_atividade']]){
    
          $activity = $_POST['deleteActivity-'.$activityId['cod_atividade']];

          $Activities::deleteActivityById($activity);
          $Involved::deleteInvolvedByActivityId($activity);

          $this->edit($id, $Events, $Activities, $Involved);
        }
      }
    }

    if(isset($_POST['edit'])){
      if($_POST['edit']){
        if (is_numeric($id)){
          $dataEvent = array(
            'nome_evento'           => $_POST['inputEvent'],
            'sigla_evento'          => $_POST['inputEventSigla'],
            'descricao_evento'      => $_POST['inputDescription'],
            'periodo_evento'        => $_POST['selectPeriodoMes'].'/'.$_POST['inputPeriodoAno'],
            'img_evento'            => $_POST['fileDragData'],
            'link_evento'           => $_POST['inputLinkEvent'],
            'link_incricao_evento'  => $_POST['inputLinkSubscriptionEvent']
          );
    
          $Events::updateEvent((int)$id, (array)$dataEvent);

          $dataActivities = $Activities::findByActivityId($id);

          foreach($dataActivities as $activityId){
            $cod_atividade = (int)$activityId['cod_atividade'];
            $dataActivity = array(
              'nome_atividade'            => $_POST['inputActivity'.$cod_atividade],
              'data_inicio'               => $_POST['dataInicio'.$cod_atividade],
              'data_fim'                  => $_POST['dataFim'.$cod_atividade],
              'descricao_atividade'       => $_POST['descriptionActivity'.$cod_atividade],
              'observacao_atividade'      => $_POST['observationActivity'.$cod_atividade],
              'preco_inscricao'           => $_POST['inputAmount'.$cod_atividade],
              'pontuacao_atividade'       => $_POST['PointsDataList'.$cod_atividade],
              'area_atividade'            => $_POST['AreaDataList'.$cod_atividade],
              'link_atividade'            => $_POST['inputLinkActivity'.$cod_atividade],
              'link_inscricao_atividade'  => $_POST['inputLinkSubscription'.$cod_atividade]
            );

            $Activities::updateActivity((int)$cod_atividade, (array)$dataActivity);

            $dataInvolved = $Involved::findById($cod_atividade);

            foreach($dataInvolved as $involved){
              $involvedId = (int)$involved['cod_pessoa'];
              $dataPerson = array(
                'nome_contato'  => $_POST['inputName-'.$cod_atividade.'-'.$involvedId],
                'email'         => $_POST['inputEmail-'.$cod_atividade.'-'.$involvedId],
                'celular'       => $_POST['inputCel-'.$cod_atividade.'-'.$involvedId],
                'telefone'      => $_POST['inputTel-'.$cod_atividade.'-'.$involvedId],
                'relacao_ifsp'  => $_POST['flexRadioDefault-'.$cod_atividade.'-'.$involvedId]
              );

              $Involved::updatePerson((int)$involvedId, (array)$dataPerson);
        
              if($dataPerson['relacao_ifsp'] == "external"){
                if(isset($_POST['BusinessDataList-'.$cod_atividade.'-'.$involvedId]) && trim($_POST['BusinessDataList-'.$cod_atividade.'-'.$involvedId]) != ""){
                  $dataCompany = array(
                    'nome_empresa'  => $_POST['BusinessDataList-'.$cod_atividade.'-'.$involvedId],
                    'email'         => $_POST['inputEmailCompany-'.$cod_atividade.'-'.$involvedId],
                    'site_empresa'  => $_POST['inputLinkBusiness-'.$cod_atividade.'-'.$involvedId],
                    'area_empresa'  => $_POST['inputAreaEmpresa-'.$cod_atividade.'-'.$involvedId]
                  );

                  $Involved::updateExternalPerson((int)$involvedId, (array)$dataCompany);
    
                }
                else {
                  $dataCompany = null;
                  $codCompany = null;
                }
    
              }
              else if($dataPerson['relacao_ifsp'] == "internal"){
                $dataInternalPerson = array(
                  'tipo_pessoa'  => $_POST['inputCategory-'.$cod_atividade.'-'.$involvedId],
                  'area_ifsp'         => $_POST['AreaIfspDataList-'.$cod_atividade.'-'.$involvedId]
                );

                $Involved::updateInternalPerson((int)$involvedId, (array)$dataInternalPerson);
              }
            }
          }
  
          header('Location: /');
        }
      }
    }
  }

}
