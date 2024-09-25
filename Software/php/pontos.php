<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

$sql = "select * from tb03_pontos order by tb03_cod_ponto desc";

$comando = $banco->prepare($sql);
$comando->execute();

$registros = $comando->fetchAll();

echo json_encode($registros);
?>
