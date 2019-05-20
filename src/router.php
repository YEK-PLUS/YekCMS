<?php
/*
* Author:YEK | Yunus Emre Köker
* Date:15.05.19
* Url:GitHub.com/YEK-PLUS
*/

class Router{
  function __construct(){
    global $DB;
    $this->db = $DB;
    $this->setup();
    $this->match();
  }

  function setup(){
    $this->r = new AltoRouter();
    $this->r->setBasePath('');
    $this->map = $this->getMap();

    while ($row = $this->map->fetch()) {
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
    return $this->db->query("SELECT * from pages");
  }

  function match(){
    $match = $this->r->match();
    if($match) {
      $name = $match["name"];
      $data = $this->db->queryFetch('SELECT * FROM pages WHERE name = "'.$name.'"');

      switch ($data["type"]) {
        case 'page':
          echo "\n<HTML>";

            echo "\n<HEAD>";
              include DIR."/src/ex-pages/meta.php";
              include DIR."/src/ex-pages/css-lib.php";
              include DIR."/src/ex-pages/css.php";
            echo "\n</HEAD>";

            echo "\n<BODY>";
              include DIR."/src/ex-pages/header.php";
              include $match["target"];
              include DIR."/src/ex-pages/footer.php";
              include DIR."/src/ex-pages/js-lib.php";
            echo "\n</BODY>";

          echo "\n</HTML>";
          break;

        case 'css':
        case 'js':
          require_once $match["target"];
          break;
        default:
          // code...
          break;
      }

      //require $match['target'];
    }
    else {
      echo "\n<HTML>";

        echo "\n<HEAD>";
          include DIR."/src/ex-pages/meta.php";
          include DIR."/src/ex-pages/css-lib.php";
          include DIR."/src/ex-pages/css.php";
        echo "\n</HEAD>";

        echo "\n<BODY>";
          include DIR."/src/ex-pages/header.php";

          require DIR.$this->db->queryFetch("SELECT path FROM pages WHERE name = 404")["path"];

          include DIR."/src/ex-pages/footer.php";
          include DIR."/src/ex-pages/js-lib.php";
        echo "\n</BODY>";

      echo "\n</HTML>";

    }
  }
}



 ?>
