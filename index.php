<?php

require_once("config.php");

$sql = new Usuario();

$sql->loadById(3);

echo $sql;

?>