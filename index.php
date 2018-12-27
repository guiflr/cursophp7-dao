<?php

require_once("config.php");

//$sql = new Usuario();
//$sql->loadById(3);
//echo $sql;

//$list = Usuario::getList();
//echo json_encode($list);

//$search = Usuario::search("ro");
//echo json_encode($search);

$login = new Usuario();

$login->login('Guilherme','123456789');

echo $login;

?>