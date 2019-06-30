<?php
include __DIR__.'/core.php';
include __DIR__.'/options.php';
include __DIR__.'/functions.php';
include __DIR__.'/router.php';
include __DIR__.'/methods.php';


use Medoo\Medoo;
$MEDOO = new Medoo(DB_CONF);
$METHODS = new Methods();
$ROUTER = new Router();


 ?>
