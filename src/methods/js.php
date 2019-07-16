<?php
$this->addMethod("js_lib",function(){
  global $MEDOO;
  global $lib;
  $js_list = $MEDOO->select("settings","*",["name"=>"active-lib"])[0];
  $js_list = explode("|",$js_list["value"]);
  foreach ($js_list as $row) {
    if( isset($lib[ $row ]) && isset( $lib[ $row ]["js"] ) ):
      echo "\n".'<script src="'.DOMAIN.$lib[$row]["js"]["path"].'"></script>';
    endif;
  }
});
$this->addMethod("js_local",function($list){
  $js_file_list_dir = DIR."/asset/js";
  $js_file_list = scandir($js_file_list_dir);
  $js_file_list = array_diff($js_file_list,[".",".."]);
  foreach ($list as $row) {
    echo in_array($row,$js_file_list)?"\n".'<script src="'.DOMAIN.'/asset/js/'.$row.'"></script>':"";
  }
});
?>
