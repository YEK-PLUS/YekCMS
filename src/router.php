<?php
/*
* Author:YEK | Yunus Emre Köker
* Date:15.05.19
* Url:GitHub.com/YEK-PLUS
*/

class Router{
  function __construct(){
    global $MEDOO;
    global $METHODS;
    $this->medoo = $MEDOO;
    $this->method = $METHODS;
    $this->setup();
    $this->match();
  }

  function setup(){
    $this->r = new AltoRouter();
    $this->r->setBasePath('');
    $this->map = $this->getMap();

    foreach($this->map as $row) {
      $method = explode(",",($row["method"]));
      $method = implode("|",$method);

      $path = DIR.$row["path"];
      $route_ex = '';
      if( !empty($row["extends"])){
        $a = json_decode($row["extends"]);
        $b = '';
        foreach ($a as $key => $value) {
          $b.="/[".$value[0].":".$value[1]."]";
        }
        unset($a);
        $route_ex = $b."/";
        unset($b);
      }

      $name = $row["name"];

      $route = $row["route"].(($route_ex != '')?$route_ex:"");
      $this->r->map( $method , $route , $path , $name );
    }
  }

  function getMap(){
    return $this->medoo->select("pages","*");
  }

  function LoadErrorPage(){
    $data = $this->medoo->select("pages","*",["name" => 404])[0];
    include DIR.$data["path"];
  }

  function match(){
    $match = $this->r->match();
    if($match) {
      $name = $match["name"];
      $data = $this->medoo->select("pages","*",["name" => $name])[0];

      switch ($data["type"]) {
        default:
            include DIR.$data["path"];
          break;
      }


    }
    else {
      $this->LoadErrorPage();
    }
  }
}



 ?>
