<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

$cod = $_REQUEST["cod"];

$sql = "select * from tb03_pontos where tb03_cod_ponto = ?";

$comando = $banco->prepare($sql);
$comando->execute(array($cod));

$registros = $comando->fetchAll();

echo json_encode($registros);
?>
