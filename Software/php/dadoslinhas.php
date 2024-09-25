<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

$sql = "select * from tb02_linhas  order by tb02_cod_linha";

$comando = $banco->prepare($sql);
$comando->execute();

$registros = $comando->fetchAll();

echo json_encode($registros);
?>