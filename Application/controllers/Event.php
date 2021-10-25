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
  public function show($id = null)
  {
    if (is_numeric($id))
    {
      $Events = $this->model('Events');
      $dataEvents = $Events::findById($id);

      $Activities = $this->model('Activities');
      $dataActivities = $Activities::findByEventId($id);

      $this->view('event/show', ['events' => $dataEvents, 'activities' => $dataActivities]);
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

  public function createEvent()
  {
    
    if (isset($_POST['inputEvent']))
    {
      $dataEvent = array(
        'nome_evento' => $_POST['inputEvent'],
        'sigla_evento' => $_POST['inputEventSigla'],
        'descricao_evento' => $_POST['inputDescription'],
        'periodo_evento' => $_POST['selectPeriodoMes'].'/'.$_POST['inputPeriodoAno'],
        'img_evento' => $_POST['fileDragData']
      );
        $dataActivities = array(
          'nome_atividade' => $_POST['inputActivity'],
          'data_inicio' => (int) $_POST['dataInicio'],
          'data_fim' => (int) $_POST['dataFim'],
          'descricao_atividade' => $_POST['descriptionActivity'],
          'observacao_atividade' => $_POST['observationActivity'],
          'preco_inscricao' => (float) $_POST['inputAmount'],
          'pontuacao_atividade' => (float) $_POST['PointsDataList'],
          'area_atividade' => $_POST['AreaDataList'],
          'link_atividade' => $_POST['inputLinkActivity'],
          'link_inscricao_atividade' => $_POST['inputLinkSubscription']
        );
      $Events = $this->model('Events');
      $data = $Events::createEvent((array)$dataEvent, (array)$dataActivities);
      $this->view('event/index', ['events' => $data, 'banner' => true, 'banner_template' => 'commons/banner']);
    }
    else
    {
      $this->pageNotFound();
    }
  }

}
