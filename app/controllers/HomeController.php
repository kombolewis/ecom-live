<?php
namespace App\Controllers;
use Core\Controller;

class HomeController extends Controller {
  
  function __construct($controller, $action) {
    parent::__construct($controller, $action);
  }

  public function indexAction() {
    $this->view->render('home/index');  
  }

  public function testAjaxAction(){
    $resp = [
      'success' => true,
      'data' => ['id' => 23,'name' => 'Curtis','favorite_food' => 'bread']
    ];
    $this->jsonResp($resp);
  }
}