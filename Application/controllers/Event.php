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

    $data = $Events::find((int)$eventsPerPage, (int) $offset);

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
    if (is_numeric($id)) {
      $Events = $this->model('Events');
      $data = $Events::findById($id);
      $this->view('event/show', ['events' => $data]);
    } else {
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


}
