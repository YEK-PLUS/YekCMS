<?php
$METHODS->addMethod("css_lib",function(){
  global $MEDOO;
  $css_list = $MEDOO->select("pages","*",["type"=>"css"]);
  foreach ($css_list as $row) {
    echo "\n\t".'<link rel="stylesheet" href="'.DOMAIN.$row["route"].'">';
  }
});
$METHODS->addMethod("css_local",function($params = null){
  $where = setParams($params,"where") != null ? setParams($params,"where") : setParams($params,0);
  $css_file_list_dir = DIR."/asset/css";
  $css_file_list = scandir($css_file_list_dir);
  $css_file_list = array_diff($css_file_list,[".",".."]);
  $css_file_list = array_diff($css_file_list,$where);
  foreach ($css_file_list as $row) {
    echo "\n\t".'<link rel="stylesheet" href="'.DOMAIN.'/css/'.$row.'">';
  }
});

?>
