<?php
include __DIR__.'/core.php';
include __DIR__.'/functions.php';
include __DIR__.'/database.php';
include __DIR__.'/router.php';



$DB = new DataBase(DB_CONF);
$ROUTER = new Router();
 ?>
