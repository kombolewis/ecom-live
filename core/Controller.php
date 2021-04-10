<?php 
namespace Core;

use Core\Application;

class Controller extends Application {
  protected $_controller, $_action;
  public $view, $request;


  function __construct($controller, $action){
    parent::__construct();
    $this->_controller = $controller;
    $this->_action = $action;
    $this->view = new View();
    $this->request =  new Input;
  }

  protected function load_model($model) {
    $modelPath = 'App\Models\\' . $model;
    if(\class_exists($modelPath)) {
      $this->{$model.'Model'} = new $modelPath(\strtolower($model));
    }
  }

  public function jsonResp($resp) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);
    echo \json_encode($resp);
    exit;
  }
}