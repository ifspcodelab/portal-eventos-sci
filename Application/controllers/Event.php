<?php

use Application\core\Controller;

class Event extends Controller
{
  /**
  * chama a view index.php da seguinte forma /user/index   ou somente   /user
  * e retorna para a view todos os usuários no banco de dados.
  */
  public function index()
  {
    $Events = $this->model('Events'); // é retornado o model Users()
    $data = $Events::findAll();
    $this->view('event/index', ['events' => $data, 'banner' => true, 'banner_template' => 'commons/banner']);
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
        $this->view('event/show', ['events' => $data]);
    }
    else
    {
      $this->pageNotFound();
    }
  }


}
