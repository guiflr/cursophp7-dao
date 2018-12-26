<?php

require_once("config.php");

$sql = new Sql();

$users = $sql->select("SELECT * FROM tb_usuario");

echo json_encode($users);

?>