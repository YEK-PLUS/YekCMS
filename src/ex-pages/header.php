
<nav class="site-header sticky-top py-1">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="<?php echo DOMAIN;?>">
      <?php printSVG("logo");?>
    </a>

    <?php
      //$data = $this->db->queryFetch('SELECT * FROM pages WHERE name = "'.$match["name"].'"');
      $data = $this->db->query('SELECT * FROM pages');
      while($row = $data->fetch()){
        echo "\n";
        echo (( json_decode($row["addon"],true)["menu"] )?
          '<a class="font-weight-bold py-2 d-none d-md-inline-block" href="'.DOMAIN.$row["route"].'">'.
            ucfirst(str_replace("-"," ",$row["name"]))
            .'</a>'
        :false);
      }
     ?>

  </div>
</nav>
