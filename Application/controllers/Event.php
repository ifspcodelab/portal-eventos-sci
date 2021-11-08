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

  public function createEvent($contActivities = null)
  {
    if (isset($_POST['inputEvent']))
    {
      $dataEvent = array(
        'nome_evento'       => $_POST['inputEvent'],
        'sigla_evento'      => $_POST['inputEventSigla'],
        'descricao_evento'  => $_POST['inputDescription'],
        'periodo_evento'    => $_POST['selectPeriodoMes'].'/'.$_POST['inputPeriodoAno'],
        'img_evento'        => $_POST['fileDragData']
      );

      $arrayActivities = array();

      for ($i = 1; $i <=  $contActivities; $i++) { 
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
          'link_inscricao_atividade'  => $_POST['inputLinkSubscription'.$i]
        );

        array_push($arrayActivities, $dataActivity);

      }

      $dataPerson = array(
        'nome_contato'  => $_POST['inputName'],
        'email'         => $_POST['inputEmail'],
        'celular'       => $_POST['inputCel'],
        'telefone'      => $_POST['inputTel'],
        'relacao_ifsp'  => $_POST['flexRadioDefault']
      );

      $Events = $this->model('Events');
      $dataEvents = $Events::createEvent((array)$dataEvent);

      $Activities = $this->model('Activities');
      $dataActivities = $Activities::createActivity((array)$arrayActivities);

      $Involved = $this->model('People');
      $dataInvolved = $Involved::createPerson((array)$dataPerson);

      $codPerson = $Involved::getLastPerson();

      if($dataPerson['relacao_ifsp'] == "external"){
        $externalPerson = $Involved::createExternalPerson((array)$codPerson);
      }
      else{
        
      }

      $this->view('/event/index', ['events' => $dataEvents, 'banner' => true, 'banner_template' => 'commons/banner']);
    }
    else
    {
      $this->pageNotFound();
    }
  }

}
