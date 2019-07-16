<?php
/**
 * Methods Class
 */
class Methods
{
  function __construct(){
    $this->loadMethods();
  }
  function addMethod($name,$method){
    if(!$this->methodNameControl($name)):
      $this->{$name} = $method;
    endif;
  }
  function methodNameControl($name){
    return isset($this->{$name}) ? true : false;
  }
  public function __call($name, $arguments){
    return call_user_func_array($this->{$name}, $arguments);
    }

  function loadMethods(){
    include __DIR__.'/methods/load.php';
  }
}

?>
