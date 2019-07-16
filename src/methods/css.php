<?php
$this->addMethod("css_lib",function(){
  global $MEDOO;
  global $lib;
  $css_list = $MEDOO->select("settings","*",["name"=>"active-lib"])[0];
  $css_list = explode("|",$css_list["value"]);
  foreach ($css_list as $row) {
    if( isset($lib[ $row ]) && isset( $lib[ $row ]["css"] ) ):
      echo "\n".'<link rel="stylesheet" href="'.DOMAIN.$lib[$row]["css"]["path"].'">';
    endif;
  }
});
$this->addMethod("css_local",function($list){
  $css_file_list_dir = DIR."/asset/css";
  $css_file_list = scandir($css_file_list_dir);
  $css_file_list = array_diff($css_file_list,[".",".."]);
  foreach ($list as $row) {
    echo in_array($row,$css_file_list)?"\n".'<link rel="stylesheet" href="'.DOMAIN.'/asset/css/'.$row.'">':"";
  }
});
?>
