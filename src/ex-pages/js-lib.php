<?php
$js_list = $this->db->query('SELECT * FROM pages where type="css"');

while($row = $js_list->fetch()){
  echo "\n".' <script src="'.DOMAIN.$row["route"].'"></script>';
}
 ?>
