<?php
function printSVG($name){
  if(file_exists(DIR."/asset/svg/".$name.".svg")){
    echo file_get_contents(DIR."/asset/svg/".$name.".svg");
  }
}
function setParams($params,$key){
  return ( ($params != null) && (gettype($params) == "array") ) && ($params[$key] != null) ? $params[$key] : [];
}

 ?>
