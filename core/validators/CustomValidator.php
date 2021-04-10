<?php
namespace Core\Validators;
use \Exception;

abstract class CustomValidator
{
  public $success = true, $msg = '', $field, $rule;
  protected $_model;


  /**
   * Class constructor.
   */
  public function __construct($model, $param)
  {
    $this->_model = $model;
    if(!array_key_exists('field',$param)){
      throw new Exception("You must add a field to the params array");
    }else {
      $this->field = (is_array($param['field'])) ? $param['field'][0] : $param['field'];
    }

    if(!property_exists($model,$this->field)) {
      throw new Exception("The field must exist in the model");
    }

    if(!array_key_exists('msg',$param)) {
      throw new Exception("Must add a msg to params array");
    }else{
      $this->msg = $param['msg'];
    }

    if(array_key_exists('rule',$param)){
      $this->rule = $param['rule'];
    }

    try {
      $this->success = $this->runValidation();
    } catch (\Exception $e) {
      echo "Validation Exception on".get_class .": ". $e->getMessage() ."<br />";
    }
  }

  abstract public function runValidation();
}

