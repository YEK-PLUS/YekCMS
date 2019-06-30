<?php
$this->addMethod("js_lib",function(){
  global $MEDOO;
  global $lib;
  $js_list = $MEDOO->select("settings","*",["name"=>"active-lib"])[0];
  $js_list = explode("|",$js_list["value"]);
  foreach ($js_list as $row) {
    if( isset($lib[ $row ]) && isset( $lib[ $row ]["js"] ) ):
      echo '<script src="'.DOMAIN.$lib[$row]["js"]["path"].'"></script>';
    endif;
  }
});
$this->addMethod("js_local",function($params = null){
  $where = setParams($params,0);
  $js_file_list_dir = DIR."/asset/js";
  $js_file_list = scandir($js_file_list_dir);
  $js_file_list = array_diff($js_file_list,[".",".."]);
  $js_file_list = array_diff($js_file_list,$where);
  foreach ($js_file_list as $row) {

    echo '<script src="'.DOMAIN.'/asset/js/'.$row.'"></script>';
  }
});
?>
