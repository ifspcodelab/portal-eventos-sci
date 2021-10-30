<?php

use Application\core\Controller;

class About extends Controller
{
  /*
  * chama a view index.php do  /about   ou somente   /
  */
  public function index()
  {
    $this->view('about/index');
  }

}
