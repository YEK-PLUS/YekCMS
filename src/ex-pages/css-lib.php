<?php
$css_list = $this->db->query('SELECT * FROM pages where type="css"');

while($row = $css_list->fetch()){
  echo "\n\t".'<link rel="stylesheet" href="'.DOMAIN.$row["route"].'">';
}
 ?>
